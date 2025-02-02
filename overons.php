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
    <title>Over ons - mboRijnland Veiligheid</title>
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
        <h1>Over mboRijnland Veiligheid</h1>
        
        <section class="mission-vision">
            <h2>Onze missie en visie</h2>
            <p>Bij mboRijnland Veiligheid streven we ernaar om een veilige, inclusieve en respectvolle leeromgeving te creëren voor alle studenten en medewerkers. Onze missie is om proactief veiligheidskwesties aan te pakken en een cultuur van bewustzijn en verantwoordelijkheid te bevorderen.</p>
            <p>Onze visie is een onderwijsomgeving waarin iedereen zich veilig voelt om te leren, te groeien en zichzelf te zijn, zonder angst voor discriminatie, pesten of andere vormen van onveiligheid.</p>
        </section>

        <section>
            <h2>Ons team</h2>
            <p>Ons toegewijde veiligheidsteam bestaat uit professionals met diverse expertises op het gebied van veiligheid, welzijn en onderwijs.</p>
            
            <div class="team-member">
                <h3>Kobus</h3>
                <p><strong>Functie:</strong> Hoofd Veiligheid</p>
                <p>Kobus heeft meer dan 15 jaar ervaring in veiligheidsmanagement in onderwijsinstellingen. Ze leidt ons team en coördineert alle veiligheidsinitiatieven binnen mboRijnland.</p>
            </div>

            <div class="team-member">
                <h3>Ayse</h3>
                <p><strong>Functie:</strong> Veiligheidsadviseur</p>
                <p>Ayse is gespecialiseerd in crisismanagement en risicoanalyse. Hij werkt nauw samen met docenten en studenten om potentiële veiligheidsrisico's te identificeren en aan te pakken.</p>
            </div>
        </section>

        <section>
            <h2>Onze aanpak</h2>
            <p>Onze benadering van veiligheid is gebaseerd op drie pijlers:</p>
            <ol>
                <li><strong>Preventie:</strong> We investeren in voorlichting, training en bewustwordingscampagnes om veiligheidsrisico's te minimaliseren.</li>
                <li><strong>Respons:</strong> We hebben duidelijke protocollen voor het omgaan met incidenten en crisissituaties.</li>
                <li><strong>Nazorg:</strong> We bieden ondersteuning en begeleiding aan betrokkenen na een incident om herstel en lering te bevorderen.</li>
            </ol>
        </section>

        <section>
            <h2>Samenwerking</h2>
            <p>We werken nauw samen met verschillende partijen om de veiligheid op onze school te waarborgen, waaronder:</p>
            <ul>
                <li>Lokale politie en hulpdiensten</li>
                <li>Gemeentelijke instanties</li>
                <li>Jeugdzorg en GGD</li>
                <li>Ouders en verzorgers</li>
            </ul>
            <p>Door deze samenwerkingen kunnen we een breed netwerk van ondersteuning bieden en snel reageren op eventuele veiligheidskwesties.</p>
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
</body>
</html>