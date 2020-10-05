<?php

include 'mysqlConnect.php';
$countryName = $_GET["country"];    
$codeName = $_GET["code"];
?>

<!DOCTYPE html>
<head>
<?php
echo '<title>Country Data - ' . $countryName . '</title>';
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
<p><a href='index.php'> << Back to Country List..</a></p>


<?php
  echo "<p>" . $countryName . " - " . $codeName . "</p>";

if (isset($_GET["code"])) {
  $showAll = $mysqli->query("SELECT * FROM ". $codeName . " ");
  if ($showAll->num_rows > 0) {
    echo "<table id='countryTable'>
      <tr>
        <th class='year'>YEAR</th>
	<th class='export'>EXPORTS</th>
        <th class='import'>IMPORTS</th>
        <th class='poverty'>POVERTY</th>
        <th class='hunger'>HUNGER</th>
        <th class='ghgemissions'>GHG EMISSIONS</th>
      </tr>";
    while ($row4 = $showAll->fetch_assoc()) {
      echo "<tr>
	<td>". $row4["year"] . "</td>
        <td>" . $row4["export"] . "</td>
        <td>" . $row4["import"] . "</td>
        <td>" . $row4["poverty"] . "</td>
        <td>" . $row4["hunger"] . "</td>
        <td>" . $row4["ghg_emissions"] . "</td>
      </tr>";
    }
  echo "</table>";
  }
} 

?>

<?php
$urlString = 'code='. $codeName . '&country='. $countryName . '';
//echo json_encode($urlString);

include 'poverty.php?code=' . $codeName . '&country=' . countryName . '';
?>

<!-- Tab links -->
<div class="tab">
  <button id="defaultOpen" class="tablinks" onclick="openIssue(event, 'Exports')">Exports</button>
  <button class="tablinks" onclick="openIssue(event, 'Imports')">Imports</button>
  <button class="tablinks" onclick="openIssue(event, 'Poverty')">Poverty</button>
  <button class="tablinks" onclick="openIssue(event, 'Hunger')">Hunger</button>
  <button class="tablinks" onclick="openIssue(event, 'GHG_Emissions')">GHG Emissions</button>
</div>

<!-- Tab content -->
<div id="Exports" class="tabcontent">
  <h3>Exports</h3>
  <canvas id="exportBarChart" height="400" width="400"></canvas>
</div>

<div id="Imports" class="tabcontent">
  <h3>Imports</h3>
  <canvas id="importBarChart" height="400" width="400"></canvas>
</div>

<div id="Poverty" class="tabcontent">
  <h3>Poverty</h3>
  <canvas id="povertyBarChart" height="400" width="400"></canvas>
</div>

<div id="Hunger" class="tabcontent">
  <h3>Hunger</h3>
  <canvas id="hungerBarChart" height="400" width="400"></canvas>
</div>

<div id="GHG_Emissions" class="tabcontent">
  <h3>GHG Emissions</h3>
  <canvas id="ghgEmissionsBarChart" height="400" width="400"></canvas>
</div>
                                     
<script src="/javascript/jquery/jquery.js"></script>
<script src="/javascript/Chart.js"></script>
<script src="/javascript/tabs.js"></script>
<?php echo '<script src="/javascript/exportdata.js?'.$urlString.'"></script>'; ?>
<?php echo '<script src="/javascript/importdata.js?'.$urlString.'"></script>'; ?>
<?php echo '<script src="/javascript/povertydata.js?'.$urlString.'"></script>'; ?>
<?php echo '<script src="/javascript/hungerdata.js?'.$urlString.'"></script>'; ?>
<?php echo '<script src="/javascript/ghgemissionsdata.js?'.$urlString.'"></script>'; ?>
  <script>
    document.getElementById("defaultOpen").click();
  </script>

</body>
</html>
