<?php
session_start();

if ($_SESSION['logged_in'] == True && $_SESSION['privilage'] == 1) {
  if (isset($_SESSION['username']) && isset($_SESSION['uid'])) {
    $uid = $_SESSION['uid'];
    $username = $_SESSION['username'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $privilage = $_SESSION['privilage'];

  }
  } else {
    header("location: index.php");
}


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  $did = $_GET['did'];
  $name = $_GET['name'];

  if(!empty($did) && !empty($name)) {
      include('PDO.php');

    echo $sql = "DELETE FROM Documents WHERE name = $name";
    echo "<br><br> GUIDO, GEEN SHIT VERWIJDEREN!";
      //$conn->exec($sql);

      //header('location: ../add_docs.php');
    } else {
      header('location: ../add_docs.php');
    }
  } else {
    header('location: ../add_docs.php');
  }

?>
