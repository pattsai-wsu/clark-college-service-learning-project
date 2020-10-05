<?php
header('Content-Type: application/json');
include 'mysqlConnect.php';

$countryName = $_GET["country"];    
$codeName = $_GET["code"];

$graphHunger = sprintf("SELECT year, hunger FROM ". $codeName . " ORDER BY 'year'");
  $result = $mysqli->query($graphHunger);

  //loop through the returned data
  $hungerData = array();
    foreach ($result as $row) {
      $hungerData[] = $row;
    }

$hungerDesc = array($hungerData);

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
echo json_encode($hungerData);

?>

