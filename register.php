<?php
session_start();
include 'connection.php';
include 'check_login.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $check = $conn->prepare("SELECT * FROM accounts WHERE username = ?");
        $check->execute([$username]);
        
        if ($check->rowCount() > 0) {
            $error = "Deze gebruikersnaam bestaat al!";
        } else {
            $stmt = $conn->prepare("INSERT INTO accounts (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $password]);
            
            $_SESSION['success'] = "Account succesvol aangemaakt!";
            header("Location: login.php");
            exit();
        }
    } catch(PDOException $e) {
        $error = "Er is een fout opgetreden bij het registreren.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <script src="script.js" defer></script>
    <title>Dashboard</title>
</head>
<body>
    <header>
        <div class="container header-content">
            <a href="/" class="logo">
                <span>mborijn</span><span>//</span><span>land</span>
                <span style="font-size: 0.8rem; margin-left: 0.5rem;">Veiligheid</span>
            </a>
            <nav>
                <a href="index.php">Home</a>
                <a href="overons.php">Over ons</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="register-container">
            <h2 style="margin-left: 0.8rem;">Registreren</h2>
            <?php
            if (isset($error)) {
                echo '<div class="error-message">' . $error . '</div>';
            }
            ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="register-form">
                <div class="form-group">
                    <label for="username">Gebruikersnaam:</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="password">Wachtwoord:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit" class="button button-primary">Registreren</button>
                <p class="login-link">Al een account? <a href="login.php">Login hier</a></p>
            </form>
        </div>
    </main>


    <footer>
        <div class="container footer-content">
            <div class="footer-section">
                <h3>Contact</h3>
                <p>mboRijnland, locatie Lammenschans</p>
                <p>Bètaplein 18</p>
                <p>2321 KS Leiden</p>
            </div>
            <div class="footer-section">
                <h3>Snelle links</h3>
                <ul>
                    <li><a href="#">Privacybeleid</a></li>
                    <li><a href="#">Gedragsregels</a></li>
                    <li><a href="#">Veelgestelde vragen</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Volg ons</h3>
                <ul>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">Instagram</a></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> mboRijnland Veiligheid. Alle rechten voorbehouden.</p>
        </div>
    </footer>
    
    <script>
        
    </script>
</body>
</html>