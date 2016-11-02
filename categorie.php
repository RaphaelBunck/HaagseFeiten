<?php
include('libraries/header.php');

include('libraries/navbar.php'); // hier staan alle head variabelen, variabelen die standaard geinporteert moeten worden, beveiliging scripts enz. en de navbar

include("libraries/PDO.php");

if($_SESSION['logged_in'] != TRUE) {
  header('location: index.php');
}
?>


<h3>Interessant nieuws van de week</h3>
<hr>

<div class="highlighted_articles">
<div class="col-sm-4 article">
  <a href="#" style="text-decoration: none;">
  <img src="http://nos.nl/data/image/2016/06/16/290937/864x486.jpg" style="width:100%">
  <div class="text">PvdA strijdt tegen 'drempels' in het onderwijs</div>
  </a>
</div>

<div class="col-sm-4 article">
  <a href="#" style="text-decoration: none;">
    <img src="http://media.nu.nl/m/bb6x6g0ab27w_wd640.jpg/pvv-wil-verlaging-eigen-risico-met-100-euro.jpg" style="width:100%">
    <div class="text">PVV wil verlaging eigen risico met 100 euro</div>
  </a>
</div>

<div class="col-sm-4 article">
  <a href="#" style="text-decoration: none;">
  <img src="http://nos.nl/data/image/2015/10/29/221275/864x486.jpg" style="width:100%">
  <div class="text">VVD en CDA willen buitenlandse verkeersovertreders aanpakken</div>
  </a>
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
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" class="form-inline">
        <div class="form-group">
          <label>Zoek op zoekterm:</label>
          <input type="text" class="form-control" placeholder="Zoekterm" name="search" value="<?php echo $_POST['search']?>">
        </div>
        <div class="form-group">
          <label for="sel1">Zoek op onderwerp:</label>
          <select class="form-control" id="sel1" name="category" onchange="this.form.submit()">
            <option value="*" >Alle</option>
            <option value="Onderwijs" <?php if($_POST['category'] == 'Onderwijs'){echo "selected";} ?>>Onderwijs</option>
            <option value="Zorg" <?php if($_POST['category'] == 'Zorg'){echo "selected";} ?>>Zorg</option>
            <option value="Economie" <?php if($_POST['category'] == 'Economie'){echo "selected";} ?>>Economie</option>
            <option value="Defensie" <?php if($_POST['category'] == 'Defensie'){echo "selected";} ?>>Defensie</option>
            <option value="Koningshuis" <?php if($_POST['category'] == 'Koningshuis'){echo "selected";} ?>>Koningshuis</option>
            <option value="Binnenland" <?php if($_POST['category'] == 'Binnenland'){echo "selected";} ?>>Binnenland</option>
            <option value="Buitenland" <?php if($_POST['category'] == 'Buitenland'){echo "selected";} ?>>Buitenland</option>
          </select>
        </div>
        <div class="form-group">
          <label for="sel1">Sorteren op:</label>
          <select class="form-control" id="sel1" name="sort" onchange="this.form.submit()">
            <option value="nieuw-oud" <?php if($_POST['category'] == 'nieuw-oud'){echo "selected";} ?>>Nieuw-oud</option>
            <option value="oud-nieuw" <?php if($_POST['category'] == 'oud-nieuw'){echo "selected";} ?>>Oud-nieuw</option>
            <option value="views" <?php if($_POST['category'] == 'views'){echo "selected";} ?>>Meest bekeken</option>
            <option value="lesviews" <?php if($_POST['category'] == 'lesviews'){echo "selected";} ?>>Minst bekeken</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Zoeken</button>
      </form>
    </div>
    <div class="search-container">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Naam</th>
            <th>Onderwerp</th>
            <th>Datum</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST' || (!$_POST['search'] && $_POST['category'] == '*')) {
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
                    $olddate = $row["ddate"];
                    $myDateTime = DateTime::createFromFormat('Y-m-d', $olddate);
                    $ddate = $myDateTime->format('d-m-Y');
                    echo '<tr>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["subject"].'</td>
                            <td>'.$ddate.'</td>
                          </tr>';
                      }
                }

            $sql = "SELECT * FROM Documents WHERE subject LIKE '%$search%'";

            foreach($conn->query($sql) as $row){
              $olddate = $row["ddate"];
              $myDateTime = DateTime::createFromFormat('Y-m-d', $olddate);
              $ddate = $myDateTime->format('d-m-Y');
              echo '<tr>
                      <td>'.$row["name"].'</td>
                      <td>'.$row["subject"].'</td>
                      <td>'.$ddate.'</td>
                    </tr>';
            }
          } else {
            $sql = "SELECT * FROM Documents WHERE subject='$category'";

            foreach($conn->query($sql) as $row){
              $olddate = $row["ddate"];
              $myDateTime = DateTime::createFromFormat('Y-m-d', $olddate);
              $ddate = $myDateTime->format('d-m-Y');
              echo '<tr>
                      <td>'.$row["name"].'</td>
                      <td>'.$row["subject"].'</td>
                      <td>'.$ddate.'</td>
                    </tr>';
            }
          }

          } else {
            $sql = "SELECT * FROM Documents ORDER BY ddate";

            foreach($conn->query($sql) as $row)
                {
                  $olddate = $row["ddate"];
                  $myDateTime = DateTime::createFromFormat('Y-m-d', $olddate);
                  $ddate = $myDateTime->format('d-m-Y');
                  echo '<tr>
                          <td>'.$row["name"].'</td>
                          <td>'.$row["subject"].'</td>
                          <td>'.$ddate.'</td>
                        </tr>';
                }
          }
          ?>

        </tbody>
      </table>
    </div>

    </div>
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
  </body>
  </html>
