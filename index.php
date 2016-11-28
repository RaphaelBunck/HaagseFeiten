<body>
<?php
include('libraries/header.php');
include('libraries/navbar.php'); // hier staan alle head variabelen, variabelen die standaard geinporteert moeten worden, beveiliging scripts enz. en de navbar?>

<div>
<div id="banner">
  <img src="afbeeldingen/parlement.jpg">
  <div class="container-fluid" id="welcome">
    <?php
      if($_SESSION['logged_in'] == True) {
        echo '<h3><b>Welkom bij Haagse Feiten!</b></h3>
        <p>Zoek je voor een bepaald onderwerp? Gebruik dan deze zoekbalk!</p>
        <form action="categorie.php" method="POST">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Zoeken" name="indexsearch">
          </div>
          <button type="submit" class="btn btn-warning btn-lg">Zoeken</button>
        </form>';
      } else {
        echo '<h3><b>Welkom bij Haagse Feiten!</b></h3>
        <p>Wat leuk dat je geïnteresseerd bent in politiek! Door een account aan te maken krijg je toegang tot een grote hoeveelheid interessante politieke documenten.</p>
        <a href="register.php" ><button type="button" class="btn btn-warning btn-lg">Registreer</button></a>';
      }


    ?>
  </div>
</div>
</div>

<div id="wrapper">
    <div id="summary">
      <h3>Wat is Haagse Feiten?</h3>
      <p>Haagse Feiten is een digitale dienst die toegang biedt tot parlementaire informatie die verrijkt wordt met data en informatie uit diverse relevante bronnen. Bronnen zoals:<br/>
          - Overheidsbronnen <br>
          - Nieuwsbronnen;<br>
          - Social media-kanalen.<br/><br/>
          Je hoeft dus nooit meer tientallen websites te bezoeken, want alle relevante informatie wordt in één oogopslag helder en inzichtelijk gepresenteerd door middel van een persoonlijk dashboard.<br/>
          Wij richten ons op bedrijven, instellingen, overheden en professionals voor wie de politieke besluitvorming én het proces van invloed zijn op hun business, beleid of praktijk. Haagse Feiten faciliteert om dit reilen en zeilen goed te kunnen monitoren, dan wel te beïnvloeden.<br/>
          Haagse Feiten is dé toegangspoort waarachter alle beschikbare overheidsinformatie eenvoudig en snel terug te vinden is.
      </p>
    </div>


      <div id="fom">
        <h3>Wat merkt Nederland van de Brexit?</h3>
        <img src="http://www.boerenbusiness.nl/upload/thumb/625/17588/brexit.jpg">
        <p><b>Wist je dat:</b> dit de oprichter is van Haagse Feiten?</p>
      </div>
    </div>

  <div class="footer">
    <div class="container-fluid">
      <ul id="footertext">
        <li><a href="#">Voorwaarden</a></li>
        <li>|</li>
        <li><a href="#">Disclaimer & Copyright</a></li>
        <li>|</li>
        <li><a href="#">Privacy</a></li>
        <li>|</li>
        <li><a href="#">Adverteren</a></li>
        <li>|</li>
        <li><a href="#">Cookies</a></li>
        <li>|</li>
        <li><a href="#">FAQ</a></li>
      </ul>
      <ul id="copyright">
        <li>&#169;Copyright 2016</li>
    </div>
  </div>
  </body>
  </html>
