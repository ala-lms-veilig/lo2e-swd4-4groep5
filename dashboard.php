<?php
session_start();
include 'check_login.php';
include 'connection.php';


if (isset($_POST['delete_incident'])) {
    $incident_id = $_POST['incident_id'];
    $username = $_SESSION['username'];
    
    try {
        $stmt = $conn->prepare("DELETE FROM incidents WHERE id = ? AND naam = ?");
        $stmt->execute([$incident_id, $username]);
        
        if ($stmt->rowCount() > 0) {
            $success = "Incident succesvol verwijderd!";
        }
    } catch(PDOException $e) {
        $error = "Er is een fout opgetreden bij het verwijderen van het incident.";
    }
}

try {
    $stmt = $conn->query("SELECT * FROM incidents ORDER BY datum DESC");
    $incidents = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $error = "Er is een fout opgetreden bij het ophalen van de incidenten.";
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
    <main>
        <h1 id="dashboard">Incident Dashboard</h1>
        <?php if (isset($success)): ?>
            <div class="success-message"><?php echo $success; ?></div>
        <?php endif; ?>
        <?php if (isset($error)): ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <section id="IncidentsContent">
            <?php if (empty($incidents)): ?>
                <p>Er zijn nog geen incidenten gemeld.</p>
            <?php else: ?>
                <?php foreach ($incidents as $incident): ?>
                    <div class="incident-card">
                        <h3><?php echo htmlspecialchars($incident['incident_type']); ?></h3>
                        <div class="incident-details">
                            <p><strong>Gemeld door:</strong> <?php echo htmlspecialchars($incident['naam']); ?></p>
                            <p><strong>Locatie:</strong> <?php echo htmlspecialchars($incident['locatie']); ?></p>
                            <p><strong>Datum:</strong> <?php echo date('d-m-Y H:i', strtotime($incident['datum'])); ?></p>
                            <p><strong>Beschrijving:</strong></p>
                            <p class="incident-description"><?php echo nl2br(htmlspecialchars($incident['beschrijving'])); ?></p>
                            
                            <?php if (isset($_SESSION['username']) && $_SESSION['username'] == $incident['naam']): ?>
                                <form method="POST" style="margin-top: 10px;">
                                    <input type="hidden" name="incident_id" value="<?php echo $incident['id']; ?>">
                                    <button type="submit" name="delete_incident" class="button button-danger">
                                        Verwijder incident
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
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
</html>
