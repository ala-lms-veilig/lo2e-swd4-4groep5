<?php
session_start();
    include 'connection.php';
    include 'check_login.php';
    ?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mboRijnland Veiligheid</title>
    <link href="stylesheet.css" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="script.js" defer></script>
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
        <section class="hero">
            <h1>Welkom bij mboRijnland Veiligheid</h1>
            <p>Samen zorgen we voor een veilige en open leeromgeving</p>
            <div>
                <a href="incident.html" class="button button-primary">Incident melden</a>
                <a href="#" class="button button-secondary">Meer informatie</a>
            </div>
        </section>

        <section class="features">
            <div class="feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#2E0E4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    <path d="M9 12l2 2 4-4"></path>
                </svg>
                <h2>Veiligheidsbeleid</h2>
                <p>Lees over onze aanpak voor een veilige school</p>
            </div>
            <div class="feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#2E0E4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                    <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                </svg>
                <h2>Meldpunt</h2>
                <p>Meld incidenten of onveilige situaties</p>
            </div>
            <div class="feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#2E0E4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <h2>Veiligheidsteam</h2>
                <p>Maak kennis met ons veiligheidsteam</p>
            </div>
            <div class="feature">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#2E0E4A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                </svg>
                <h2>Noodcontacten</h2>
                <p>Belangrijke contacten voor noodgevallen</p>
            </div>
        </section>

        <section class="newsletter">
            <h2>Blijf op de hoogte</h2>
            <p>Ontvang updates over veiligheid op mboRijnland Lammenschans</p>
            <form>
                <input type="email" placeholder="Jouw e-mailadres" required>
                <button type="submit" class="button button-primary">Aanmelden</button>
            </form>
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
        <div id="JSON">

        </div>
    </footer>
</body>
</html>