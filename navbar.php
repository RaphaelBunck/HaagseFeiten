<!DOCTYPE html>
<html>
<head>
  <?php $title = explode("/",$_SERVER['SCRIPT_FILENAME']);
        echo "<title>" . explode(".",$title[count($title) - 1 ])[0] . "</title>";
        // ik kan een omlees tabel maken in library.php om dus het resultaat ^ bijv. home, om te zetten in Homepage via een simpele object orientated array (key -> value)
  ?>
<link rel="stylesheet" type="text/css" href='css/index.css'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body bgcolor="#ffffff">
  <nav class='navbar navbar-default'>
        <div class='container-fluid'>
          <div class='navbar-header'>
            <a class='navbar-brand' href='#'>Haagse Feiten</a>
          </div>
          <ul class='nav navbar-nav'>
          <li role="presentation" <?php if($_SERVER['SCRIPT_FILENAME'] == '/var/www/html/'){echo "class='active'";} ?>><a href='index.php'>Home</a></li>
          <li role="presentation" <?php if($_SERVER['SCRIPT_FILENAME'] == '/var/www/html/'){echo "class='active'";} ?>><a href='zoeken.php'>Zoeken</a></li>
          <li role="presentation" <?php if($_SERVER['SCRIPT_FILENAME'] == '/var/www/html/'){echo "class='active'";} ?>><a href='#'>Contact</a></li>
          <li role="presentation" <?php if($_SERVER['SCRIPT_FILENAME'] == '/var/www/html/'){echo "class='active'";} ?>><a href='#'>Page 3</a></li>
        </ul>
      </div>
    </nav>
