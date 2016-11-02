<!DOCTYPE html>
<?php
  session_start();
  if(isset($_SESSION['username'])) {
    header("location: index.php");
  }
?>
<html>
  <head>
    <?php
      $title = "Registreer";
      include("libraries/header.php");
    ?>
  </head>
  <body>
    <?php include("libraries/navbar.php") ?>

    <?php
      $banana = " has-error ";

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $uname_err = $fname_err = $lname_err = $email_err = $password_err = $repassword_err = $age_err ="";
        $username = $first_name = $last_name = $email = $password = $repassword = "";

        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        function dbinsert() {
          global $username, $first_name, $last_name, $email, $dateob, $finalpassword;
          $servername = 'localhost';
          $dbusername = 'Peter';
          $dbpassword = 'ShoarmaLikken10!';
          $dbdatabase = 'HaagseFeiten';
          $tablename = "user";
          $timestamp = date("Y-m-d");

          try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbdatabase", $dbusername, $dbpassword);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO $tablename (username, password, email, dateob, first_name, last_name, timestamp)
        VALUES ('$username', '$finalpassword', '$email', '$dateob', '$first_name', '$last_name', '$timestamp')";
        // use exec() because no results are returned
        $conn->exec($sql);
        //echo "New record created successfully";
        }
        catch(PDOException $e)
        {
          echo $sql . "<br>" . $e->getMessage();
        }

        $conn = null;
        header("location: login.php");
        }

        function usernamecheck($checkname) {
          include("libraries/PDO.php");

          $sql = "SELECT * FROM $tablename WHERE username = '$checkname'";
          $sql_res =   $conn->query($sql);
          $count = count($sql_res->fetchAll());
          if($count > 0){
            return 1;
          } else {
            return 0;
          }

          $conn = null;
        }

        function emailcheck($checkemail) {
          include("libraries/PDO.php");

          $sql = "SELECT * FROM $tablename WHERE email = '$checkemail'";
          $sql_res =   $conn->query($sql);
          $count = count($sql_res->fetchAll());
          if($count > 0){
            return 1;
          } else {
            return 0;
          }

          $conn = null;
        }

        function agecalc($dob) {
          if(!empty($dob)) {
            $birthdate = new DateTime($dob);
            $today   = new DateTime('today');
            $age = $birthdate->diff($today)->y;
            return $age;
          } else {
            return 0;
          }
        }

        if (empty($_POST['username'])) {
          $uname_err = "* Vul alstublieft een gebruikersnaam in.";
        } elseif (usernamecheck($_POST['username']) == 1) {
          $uname_err = "* Deze gebruikernaam bestaat al.";
        } else {
          $username = test_input($_POST['username']);
        }

        if (empty($_POST['first_name'])) {
          $fname_err = "* Vul alstublieft uw voornaam in.";
        } else {
          $first_name = ucfirst(test_input($_POST['first_name']));
        }

        if (empty($_POST['last_name'])) {
          $lname_err = "* Vul alstublieft uw achternaam in.";
        } else {
          $last_name = ucfirst(test_input($_POST['last_name']));
        }

        if (empty($_POST['email'])) {
          $email_err = "* Vul alstublieft een e-mailadres in.";
        } elseif (emailcheck($_POST['email']) == 1) {
          $email_err = "* Dit e-mailadres bestaat al.";
        } else {
          if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            $email = test_input($_POST['email']);
          } else {
            $wrong_email = $_POST['email'];
            $email_err = "* $wrong_email is geen geldig e-mailadres.";
          }

        }

        if (empty($_POST['password'])) {
          $password_err = "* Vul alstublieft een wachtwoord in.";
        } else {
          $password = test_input($_POST['password']);
        }

        if (empty($_POST['repassword'])) {
          $repassword_err = "* Vul alstublieft uw wachtwoord nogmaals in.";
        } else {
          $repassword = test_input($_POST['repassword']);
        }

          $day = $_POST['day'];
          $month = $_POST['month'];
          $year = $_POST['year'];
          $testdob = $year . "-" . $month . "-" . $day;

          if(agecalc($testdob) < 18){
            $age_err = "* U bent te jong.";
          } else {
            $dateob = $year . "-" . $month . "-" . $day;
          }

          if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($email) && !empty($password) && !empty($repassword) && !empty($dateob)) {
          if ($password == $repassword) {
            $finalpassword = password_hash($password, PASSWORD_DEFAULT);
            dbinsert();
          } else {
            $password_err = $repassword_err = "* De wachtwoorden die u heeft ingevuld komen niet overeen.";
          }
      }
}


    ?>

    <div class="container">
      <h3>Registreren</h3>
    </div>

      <hr>

    <div class="container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

            <div class="form-group row <?php if ($uname_err) {echo $banana;} ?>">
              <label class="col-sm-2 col-form-label">Gebruikersnaam</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="<?php if($uname_err) {echo $uname_err;}else {echo 'Gebruikersnaam';} ?>" value="<?php echo $username; ?>" name="username">
              </div>
            </div>
            <div class="form-group row <?php if ($fname_err) {echo $banana;} ?>">
              <label class="col-sm-2 col-form-label">Voornaam</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="<?php if($fname_err) {echo $fname_err;}else {echo 'Voornaam';} ?>" value="<?php echo $first_name; ?>" name="first_name">
              </div>
            </div>
            <div class="form-group row <?php if ($lname_err) {echo $banana;} ?>">
              <label class="col-sm-2 col-form-label">Achternaam</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="<?php if($lname_err) {echo $lname_err;}else {echo 'Achternaam';} ?>" value="<?php echo $last_name; ?>" name="last_name">
              </div>
            </div>
            <div class="form-group row <?php if ($email_err) {echo $banana;} ?>">
              <label class="col-sm-2 col-form-label">E-mailadres</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="<?php if($email_err) {echo $email_err;}else {echo 'E-mailadres';} ?>" value="<?php echo $email; ?>" name="email">
              </div>
            </div>

            <div class="form-group row <?php if ($age_err) {echo $banana;} ?>">
              <label class='col-sm-2 col-form-label'>Geboortedatum</label>

                <?php
                  $days = range(1,31);
                  $months = array(1 =>'Januari', 'februari', 'Maart', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'Oktober', 'November', 'December');
                  $years = range(1950, date("Y"));

                  echo '<div class="col-sm-3">';
                  echo '<select class="form-control" name="day">';
                    foreach($days as $value) {
                      echo "<option value=\"$value\"> $value </option> \n";
                  }
                  echo "</select> </div>";

                  echo '<div class="col-sm-3">';
                  echo '<select class="form-control" name="month">';
                    foreach($months as $key => $value) {
                      echo "<option value=\"$key\"> $value </option> \n";
                  }
                  echo "</select> </div>";

                  echo '<div class="col-sm-4">';
                  echo '<select class="form-control" name="year" >';
                    foreach($years as $value) {
                      if ($value == 2016) {
                      echo "<option value=\"$value\" selected=\"selected\"> $value </option>";
                    } else {
                      echo "<option value=\"$value\"> $value </option>";
                    }
                  }
                  echo '</select> </div>';
                ?>
              </div>

              <div class="form-group row <?php if ($password_err) {echo $banana;} ?>">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Wachtwoord</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputEmail3" placeholder="<?php if($password_err) {echo $password_err;}else {echo 'Wachtwoord';} ?>" name="password">
                </div>
              </div>
              <div class="form-group row <?php if ($repassword_err) {echo $banana;} ?>">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Wachtwoord herhalen</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="inputEmail3" placeholder="<?php if($repassword_err) {echo $repassword_err;}else {echo 'Wachtwoord opnieuw';} ?>" name="repassword">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-warning">Bevestigen</button>
                </div>

              </div>

          </form>
        </div>
      <hr>
  </body>
</html>
