<!DOCTYPE html>
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
?>
<html>
  <head>
    <?php
    $title="Homepage";
    include("libraries/header.php");
    ?>

    <script> //Dit is blijkbaar ervoor dat je de wanna delete popup krijgt. Idk of het echt nodig is.
    $(document).ready(function() {
      $('a[data-confirm]').click(function(ev) {
        var href = $(this).attr('href');
        if (!$('#dataConfirmModal').length) {
          $('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Please Confirm</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-primary" id="dataConfirmOK">OK</a></div></div>');
          }
          $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
          $('#dataConfirmOK').attr('href', href);
          $('#dataConfirmModal').modal({show:true});
          return false;
        });
      });
    </script>
  </head>
  <body>
    <span id="chromefix"></span>

    <?php include("libraries/navbar.php") ?>

    <?php

      function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

      function generateRandomString($length = 20) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
    }

      function dbinsert() {
        global $naam, $merk, $vermogen, $kenteken, $cilinderinhoud, $gewicht, $koppel, $motorsoort, $versnellingen, $beschrijving, $img_name, $prijs_uur, $prijs_dag, $prijs_week;

        include("libraries/PDO.php");

        $sql = "INSERT INTO Documents (name, subject, ddate, location)
        VALUES ('$name', '$subject', '$ddate', '$img_name')";

        //$conn->exec($sql);
    }

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Form recieved <br>";
        $name = $subject = $ddate = "";

        $name = $_POST['name'];
        $subject = $_POST['subject'];
        $ddate = $_POST['ddate'];
      //file upload

      if (isset($_FILES['file'])) {
        $file = $_FILES['file'];
        echo "file is set <br>";
        // File properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $img_name = strtolower($file_name);
        // File extension
        $file_ext = explode('.', $file_name)[1];
        $file_ext = strtolower($file_ext);

        $allowed = array('pdf', 'doc');

        if (!empty($name) && !empty($subject) && !empty($ddate)) {
          if(in_array($file_ext, $allowed)) {
            if ($file_error === 0) {
              if($file_size <= 2097152) {

                $img_name = $file_name_new = generateRandomString() . '.' . $file_ext;
                $file_destination = 'documents/' . $file_name_new;
                dbinsert();
                if(move_uploaded_file($file_tmp, $file_destination)) {
                  echo "File uploaded!";
                }
              }
            }
          }
        }
      }
    }


?>

        <div class="container">
          <h3>Documenten in database</h3>
          <hr>
          <table class="table table-condensed">
            <thead>
              <tr>
                <th>Id</th>
                <th>Naam</th>
                <th>Onderwerp</th>
                <th>Datum</th>
                <th>Locatie</th>
              </tr>
            </thead>
            <tbody>
              <?php

                include("libraries/PDO.php");

                $sql = "SELECT * FROM Documents";

                foreach($conn->query($sql) as $row)
                {
                  echo '<tr>
                          <td>'.$row["did"].'</td>
                          <td>'.$row["name"].'</td>
                          <td>'.$row["subject"].'</td>
                          <td>'.$row["ddate"].'</td>
                          <td>'.$row["location"].'</td>
                          <td><a href="libraries/deldoc.php?did='. $row["did"] .'&name='. $row['name'] .'" class="btn btn-danger btn-sm" onclick="return confirm(\'Weet je zeker dat je dit document uit de databse wilt verwijderen?\');">
                          <span class="glyphicon glyphicon-remove"></span>Verwijderen</a></td>
                        </tr>';
                }

              ?>
            </tbody>
          </table>

          <h3>Document toevoegen</h3>
          <hr>
          <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
          <div class="form-group row <?php if ($name_err) {echo $banana;} ?>">
            <label class="col-sm-2 col-form-label">Naam</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="<?php if($name_err) {echo $name_err;}else {echo 'Documentnaam';} ?>" value="<?php echo $name; ?>" name="name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Onderwerp</label>
            <div class="col-sm-10">
              <select class="form-control" name="subject">
                <option value="Onderwijs">Onderwijs</option>
                <option value="Zorg">Zorg</option>
                <option value="Economie">Economie</option>
                <option value="Defensie">Defensie</option>
                <option value="Koningshuis">Koningshuis</option>
                <option value="Binnenland">Binnenland</option>
                <option value="Buitenland">Buitenland</option>
              </select>
            </div>
          </div>

          <div class="form-group row <?php if ($ddate_err) {echo $banana;} ?>">
            <label class="col-sm-2 col-form-label">Datum</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" placeholder="<?php if($ddate_err) {echo $ddate_err;}else {echo 'Datum';} ?>" value="<?php echo $ddate; ?>" name="ddate">
            </div>
          </div>
          <div class="form-group row <?php if ($doc_err) {echo $banana;} ?>">
            <label class="col-sm-2 col-form-label">Document</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" placeholder="<?php if($doc_err) {echo $doc_err;}else {echo 'Document';} ?>" value="<?php echo $ddate; ?>" name="ddate">
            </div>
          </div>
            <input type="file" name="file"><br />
          <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Bevestigen</button>
            </div>
          </div>
        </form>
        </div>
  </body>
</html>
