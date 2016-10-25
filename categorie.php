<!DOCTYPE html>
<html>
<head>
<title>Haagse Feiten</title>
<link type="text/css" rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
  <?php include('navbar.php') // hier staan alle head variabelen, variabelen die standaard geinporteert moeten worden, beveiliging scripts enz. en de navbar?>

  <div id="banner">
    <img src="afbeeldingen/parlemetn.jpg">
  </div>
  <h2>Accordion Example</h2>
  <p><strong>Note:</strong> The <strong>data-parent</strong> attribute makes sure that all collapsible elements under the specified parent will be closed when one of the collapsible item is shown.</p>

  <div class="panel-group" id="accordion">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" backgroud-color=green>Onderwijs</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in" backgroud-color=green>
        <div class="panel-body">In het schooljaar 2016 zullen alle docenten verplicht hun naam in Gerd veranderen.</div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" background-color=blue>VIERKANT</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse" background-color=blue>
          <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
          </div>
        </div>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" backgroud-color=green>DRIEHOEK</a>
            </h4>
          </div>
          <div id="collapse3" class="panel-collapse collapse" background-color=green>
            <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
              sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            </div>
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
