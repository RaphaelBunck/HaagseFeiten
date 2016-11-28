<!DOCTYPE html>

<html>
  <head>
    <?php
      $title = "login";
      include("libraries/header.php");
    ?>
  </head>
  <body>
    <?php
      include("libraries/PDO.php");
      include("libraries/navbar.php");
    ?>
    <div class="container">
      <h3>Favorieten</h3>
      <hr>
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Naam</th>
            <th>Genre</th>
            <th>Datum</th>
            <th style="text-align: center;">Favorieten</th>
          </tr>
        </thead>
        <tbody>
          <?php

            $sql = "SELECT * FROM usertag WHERE uid = '$uid'";

            $checkthisshit = false;
            foreach($conn->query($sql) as $row)
            {
              $did = $row['did'];
              $sql = "SELECT * FROM Documents WHERE did='$did'";
              foreach($conn->query($sql) as $row){

                $did = $row['did'];

                $result = false;
                $sql = "SELECT * FROM usertag WHERE did='$did' AND uid='$uid' AND favorite=1";
                foreach($conn->query($sql) as $utrow){
                  $result = true;
                }

                $olddate = $row["ddate"];
                $myDateTime = DateTime::createFromFormat('Y-m-d', $olddate);
                $ddate = $myDateTime->format('d-m-Y');
                echo '<tr>
                <td><a href="#datamodal" data-toggle="modal" data-target="#datamodal">'.$row["name"].'</a></td>
                <td>'.$row["subject"].'</td>
                <td>'.$ddate.'</td>';
              if($result){
                echo '<td style="text-align: center;"><button onclick="unfavorite(' . $did . ')" class="fa fa-star"></button></td>';
              } else {
                echo '<td style="text-align: center;"><button onclick="favorite(' . $did . ')" class="fa fa-star-o"></button></td>';
              }
                echo '</tr>';
              }
              $checkthisshit = true;
            }

            if ($checkthisshit === false) {
              echo '<tr>
              <td colspan="4" style="text-align: center;">Geen favorieten... :(</td>
              </tr>';
            }
          ?>
        </tbody>
      </table>
    </div>
    <script>

    function favorite(did){
      $.post("categorie/favorite.php",
      {
        did: did
      },
      function(data,status){
        if(data == 1){
         //alert("Data: " + data + "\nStatus: " + status);
         $('button[onclick="favorite(' + did + ')"]').attr('class', 'fa fa-star');
         $('button[onclick="favorite(' + did + ')"]').attr('onclick', 'unfavorite(' + did + ')');
       }
      });
    }

    function unfavorite(did){
      $.post("categorie/unfavorite.php",
      {
        did: did
      },
      function(data,status){
        if(data == 1){
         //alert("Data: " + data + "\nStatus: " + status);
         $('button[onclick="unfavorite(' + did + ')"]').attr('class', 'fa fa-star-o');
         $('button[onclick="unfavorite(' + did + ')"]').attr('onclick', 'favorite(' + did + ')');
       }
      });
    }
    </script>

  </body>
</html>
