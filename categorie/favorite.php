<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  session_start();

  if($_SESSION['logged_in'] != true || !$_SESSION['uid']){
    header('Location: ../login.php');
  }

  include ('../libraries/PDO.php');

  $uid = $_SESSION['uid'];

  $did = $_POST['did'];

$stmt = $conn->prepare("INSERT INTO usertag (favorite,uid,did) VALUES (?,?,?)");
echo $stmt;
$stmt->execute([1,$uid,$did]);

}
?>
