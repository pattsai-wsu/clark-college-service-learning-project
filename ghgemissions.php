<?php
header('Content-Type: application/json');
include 'mysqlConnect.php';

$countryName = $_GET["country"];    
$codeName = $_GET["code"];

$graphGhgEmissions = sprintf("SELECT year, ghg_emissions FROM ". $codeName . " ORDER BY 'year'");
  $result = $mysqli->query($graphGhgEmissions);

  //loop through the returned data
  $ghgEmissionsData = array();
    foreach ($result as $row) {
      $ghgEmissionsData[] = $row;
    }

$ghgEmissionsDesc = array($ghgEmissionsData);

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
echo json_encode($ghgEmissionsData);

?>

