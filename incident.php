<?php
session_start();
    include 'connection.php';
    include 'check_login.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_SESSION['username'];
    $incident_type = $_POST['incident'];
    $locatie = $_POST['locatie'];
    $beschrijving = $_POST['beschrijving'];

    try {
        $stmt = $conn->prepare("INSERT INTO incidents (naam, incident_type, locatie, beschrijving) VALUES (?, ?, ?, ?)");
        $stmt->execute([$naam, $incident_type, $locatie, $beschrijving]);
        
        $success = "Incident succesvol gemeld!";
    } catch(PDOException $e) {
        $error = "Er is een fout opgetreden bij het melden van het incident.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Melden - mboRijnland Veiligheid</title>
    <script src="script.js" defer></script>
    <link href="stylesheet.css" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
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
                <?php 
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                    echo '<a href="incident.php">Melden</a>';
                    echo '<a href="dashboard.php">Dashboard</a>';
                    echo '<a href="login.php?logout=true">Uitloggen</a>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
                ?>
</nav>
        </div>
    </header>

    <main class="container">
        <h1>Incident Melden</h1>
        <?php
        if (isset($success)) {
            echo '<div class="success-message">' . $success . '</div>';
        }
        if (isset($error)) {
            echo '<div class="error-message">' . $error . '</div>';
        }
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="incidentForm">
            <label for="name">Naam:</label>
            <input type="text" id="name" name="naam" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" readonly>

            <label for="incident-type">Type incident:</label>
            <select id="incident-type" name="incident" required>
                <option value="">Selecteer een type</option>
                <option value="pesten">Pesten</option>
                <option value="discriminatie">Discriminatie</option>
                <option value="geweld">Geweld</option>
                <option value="diefstal">Diefstal</option>
                <option value="vandalisme">Vandalisme</option>
                <option value="anders">Anders</option>
            </select>

            <label for="location">Locatie:</label>
            <input type="text" id="location" name="locatie" required>

            <label for="description">Beschrijving van het incident:</label>
            <textarea id="description" name="beschrijving" required></textarea>

            <button type="submit" class="button button-primary">Versturen</button>
        </form>
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

</body>
</html>
