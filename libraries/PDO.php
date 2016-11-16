<?php
  $servername = '213.10.31.95';
  $dbusername = 'mysql';
  $dbpassword = 'ShoarmaLikken10!';
  $dbdatabase = 'haagsefeiten';
  $tablename = "user";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbdatabase", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
  }
  catch(PDOException $e)
  {
    echo "Connection failed: " . $e->getMessage();
  }

?>
