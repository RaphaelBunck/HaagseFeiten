<?php

include('libraries/header.php');

include('libraries/navbar.php'); // hier staan alle head variabelen, variabelen die standaard geinporteert moeten worden, beveiliging scripts enz. en de navbar

include("libraries/PDO.php");

if($_SESSION['logged_in'] != TRUE) {
  header('location: index.php');
}
?>

<div class="container">

  <h3>Interessant nieuws van de week</h3>
  <hr>

  <div class="highlighted_articles">
    <div class="col-md-4 article">
      <a href="#" style="text-decoration: none;">
        <img src="http://nos.nl/data/image/2016/06/16/290937/864x486.jpg" style="width:100%">
        <div class="text">PvdA strijdt tegen 'drempels' in het onderwijs</div>
      </a>
    </div>

    <div class="col-md-4 article">
      <a href="#" style="text-decoration: none;">
        <img src="http://media.nu.nl/m/bb6x6g0ab27w_wd640.jpg/pvv-wil-verlaging-eigen-risico-met-100-euro.jpg" style="width:100%">
        <div class="text">PVV wil verlaging eigen risico met 100 euro</div>
      </a>
    </div>

    <div class="col-md-4 article">
      <a href="#" style="text-decoration: none;">
        <img src="http://nos.nl/data/image/2015/10/29/221275/864x486.jpg" style="width:100%">
        <div class="text">VVD en CDA willen buitenlandse verkeersovertreders aanpakken</div>
      </a>
    </div>

  </div>

</div>
  <!--<div class="container">
  <div id="accordion">
  <h3>Onderwijs</h3>
  <div>
  <h4><b>Populairste documenten:</b></h4>
  <p><a href="#">- Politiek over de vrijheid van onderwijs</a></p>
  <p><a href="#">- SP en D66 maken plan voor kleinere klassen</a></p>
  <p><a href="#">- Alleen in eerste jaar bindend studieadvies</a></p>
  <p><a href="#">- Meer gepensioneerde docenten voor de klas</a></p>
</div>
<h3>Section 2</h3>
<div>
<p>
Dingen
</p>
</div>
<h3>Section 3</h3>
<div>
<p>
Meer dingen
</p>
</div>
<h3>Diversen</h3>
<div>
<p>
Nog meer dingen
</p>
</div>
</div>
</div>
-->
<div class="container" style="top: 20px; position: relative;">
  <div class="search">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" role="form">
      <div class="form-group col-md-4">
        <label for="search">Zoek op zoekterm</label>
        <input type="text" class="form-control" placeholder="Zoekterm" name="search">
      </div>
      <div class="form-group col-md-4">
        <label for="category">Zoek op onderwerp</label>
        <select class="form-control" id="sel1" name="category">
          <option value="*" >Alle</option>
          <option value="Onderwijs">Onderwijs</option>
          <option value="Zorg">Zorg</option>
          <option value="Economie">Economie</option>
          <option value="Defensie">Defensie</option>
          <option value="Koningshuis">Koningshuis</option>
          <option value="Binnenland">Binnenland</option>
          <option value="Buitenland">Buitenland</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 25px;">Zoeken</button>
      </div>
    </form>
  </div>
  <div class="search-container">
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Naam</th>
          <th>Onderwerp</th>
          <th>Datum</th>
          <th style="text-align: center;">Favorieten</th>
        </tr>
      </thead>
      <tbody>
        <?php
      if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['category'])) {
        $search = $_POST['search'];
          $category = $_POST['category'];
          if($search){
            if($category == "*"){
              $sql = "SELECT * FROM tag WHERE tag LIKE '%$search%'";
            } else {
              $sql = "SELECT * FROM tag WHERE tag LIKE '%$search%' AND tagsubject='$category'";
            }

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
                <td><a href="test.pdf" target="blank">'.$row["name"].'</a></td>
                <td>'.$row["subject"].'</td>
                <td>'.$ddate.'</td>';
              if($result){
                echo '<td style="text-align: center;"><button onclick="unfavorite(' . $did . ')" class="fa fa-star"></button></td>';
              } else {
                echo '<td style="text-align: center;"><button onclick="favorite(' . $did . ')" class="fa fa-star-o"></button></td>';
              }
                echo '</tr>';
              }
            }

            $sql = "SELECT * FROM Documents WHERE subject LIKE '%$search%'";

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
              <td><a href="test.pdf" target="blank">'.$row["name"].'</a></td>
              <td>'.$row["subject"].'</td>
              <td>'.$ddate.'</td>';
            if($result){
              echo '<td style="text-align: center;"><button onclick="unfavorite(' . $did . ')" class="fa fa-star"></button></td>';
            } else {
              echo '<td style="text-align: center;"><button onclick="favorite(' . $did . ')" class="fa fa-star-o"></button></td>';
            }
              echo '</tr>';
            }
          } else {
            if($category = "*") {
              $sql = "SELECT * FROM Documents";
            } else {
            $sql = "SELECT * FROM Documents WHERE subject='$category'";
            }
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
              <td><a href="test.pdf" target="blank">'.$row["name"].'</a></td>
              <td>'.$row["subject"].'</td>
              <td>'.$ddate.'</td>';
              if($result){
              echo '<td style="text-align: center;"><button onclick="unfavorite(' . $did . ')" class="fa fa-star"></button></td>';
              } else {
              echo '<td style="text-align: center;"><button onclick="favorite(' . $did . ')" class="fa fa-star-o"></button></td>';
              }
              echo '</tr>';
            }
          }

        } elseif (isset($_POST['indexsearch'])) {

          $indexsearch = $_POST['indexsearch'];

          $sql = "SELECT * FROM tag WHERE tag LIKE '%$indexsearch%'";

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
          }


        } else {
          $sql = "SELECT * FROM Documents ORDER BY ddate";

          foreach($conn->query($sql) as $row)
          {
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
        }
        ?>

      </tbody>
    </table>
  </div>

</div>

<script type="text/javascript">
$('#pdf_frame').css('height','auto');
</script>

<!--  <div class="footer">
<div class="container-fluid">
<ul id="footertext">
<li><a href="#">Voorwaarden</a></li>
<li>|</li>
<li><a href="#">Disclaimer & Copyright</a></li>
<li>|</li>
<li><a href="#">Privacy</a></li>
<li>|</li>
<li><a href="#">Adverteren</a></li>
<li>|</li>
<li><a href="#">Cookies</a></li>
<li>|</li>
<li><a href="#">FAQ</a></li>
</ul>
<ul id="copyright">
<li>&#169;Copyright 2016</li>
</div>
</div> -->

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

  /*$(function() {
    $('.fa').click(function() {
      var wasPlay = $(this).hasClass('fa-star-o');
      $(this).removeClass('fa-star-o fa-star');
      var klass = wasPlay ? 'fa-star' : 'fa-star-o';
      $(this).addClass(klass)
    });
  });*/
  </script>
</body>
</html>
