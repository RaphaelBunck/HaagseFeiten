<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  session_start();

  if($_SESSION['logged_in'] != true || !$_SESSION['uid']){
    header('Location: ../login.php');
  }

  include ('../libraries/PDO.php');

  $uid = $_SESSION['uid'];

  $did = $_POST['did'];

$stmt = $conn->prepare("DELETE FROM usertag WHERE favorite=1 AND uid=? AND did=?");
$stmt->execute([$uid,$did]);

echo 1;
}
?>
