  <nav class="navbar navbar-default" id="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
        <img style="max-width:100px; margin-top: -15px;" alt="Brand" id="logo" src="afbeeldingen/logo.jpg">
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
        if($_SESSION['logged_in'] == True) {
          echo '<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Informatie zoeken<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="categorie.php">Zoeken op categorie</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Meest bekeken artikelen</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Leuke ideeën voor presentaties</a></li>
            </ul>
          </li>';
        } else {
          echo '<li><a href="#">Wat is het?</a></li>';
        }

        ?>
        <li><a href="#">Over ons</a></li>
        <li><a href="#">Nieuws</a></li>
        <li><a href="#">Contact</a></li>
        <?php
        if($_SESSION['logged_in'] == True && $_SESSION['privilage'] == 1) {
          echo '<li><a href="add_docs.php">Beheerders</a></li>';
        }
        ?>

      </ul>
      <form action="categorie.php" method="POST" class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Zoeken" name="indexsearch">
        </div>
        <button type="submit" class="btn btn-default">Zoek</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php
            if($_SESSION['logged_in'] == True) {
              echo
              '<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Ingelogd als: ' . $first_name . ' ' . $last_name .' <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="favorites.php">Favoriete documenten</a></li>
                <li><a href="#">Instellingen</a></li>
                <li><a href="libraries/logout.php">Uitloggen</a></li>
               </ul>
              </li>';
            } else {
              echo '<li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Aanmelden</a></li>';
              echo '<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Inloggen</a></li>';
            }
            ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
