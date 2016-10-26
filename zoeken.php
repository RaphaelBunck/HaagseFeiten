<?php include('navbar.php') // hier staan alle head variabelen, variabelen die standaard geinporteert moeten worden, beveiliging scripts enz. en de navbar?>


<div id="banner">
  <img src="image/banner.jpg">
</div>

<div class="container">

<?php if(!$_GET['s']){
  echo "
  <div style='margin-top: 20%'
    <form class='form-inline'>
        <input type='text' class='form-control' placeholder='Zoek document' name='s' style='width: 90%;'>
        <button type='submit' class='btn btn-default'>Zoeken</button>
    </form>
  </div>
  ";
} ?>

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
