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
      $title = "login";
      include("libraries/header.php");
    ?>
  </head>
  <body>
    <?php include("libraries/navbar.php");
      $uname_err = $password_err = "";
    ?>
    <?php

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        session_unset();
        $inusername = $_POST['username'];
        $inpassword = $_POST['password'];
        $fields = array('username', 'password');

        $error = false; //No errors yet
        foreach($fields AS $fieldname) { //Loop trough each field
          if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname])) {
            if($fieldname == "username") {
            $uname_err = '* Vul alstublieft een gebruikersnaam in.';
          } elseif($fieldname == "password") {
            $password_err = "* Vul alstublieft een wachtwoord in.";
          }
            $error = true; //Yup there are errors
          }
        }
         if(!$error) {
           handle_login();
         }
      }

      function handle_login() {
        global $inusername, $inpassword;
        include("libraries/PDO.php");

        $sql = "SELECT * FROM user WHERE username = '$inusername'";

        foreach ($conn->query($sql) as $row ) {
          $uid = $row['uid'];
          $username = $row['username'];
          $password = $row['password'];
          $email = $row['email'];
          $dateob = $row['dateob'];
          $first_name = $row['first_name'];
          $last_name = $row['last_name'];
          $privilage = $row['privilage'];
        }

        if ($inusername == $username && password_verify($inpassword, $password)) {
          $_SESSION['uid'] = $uid;
          $_SESSION['username'] = $username;
          $_SESSION['email'] = $email;
          $_SESSION['dateob'] = $dateob;
          $_SESSION['first_name'] = $first_name;
          $_SESSION['last_name'] = $last_name;
          $_SESSION['privilage'] = $privilage;
          $_SESSION['logged_in'] = True;
          header('location: index.php');
        } else {
          $uname_err = "Uw gebruikersnaam en/of wachtwoord kloppen niet. Probeer het opnieuw.";
          echo $uname_err;
        }
        $conn = null;
      }

      $banana = "has-error";
    ?>


    <div class="container">
      <h3>Inloggen</h3>
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
            <div class="form-group row <?php if ($password_err) {echo $banana;} ?>">
              <label class="col-sm-2 col-form-label">Wachtwoord</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="<?php if($password_err) {echo $password_err;}else {echo 'Wachtwoord';} ?>" name="password">
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
