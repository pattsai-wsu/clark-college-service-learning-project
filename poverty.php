<?php
header('Content-Type: application/json');
include 'mysqlConnect.php';

$countryName = $_GET["country"];    
$codeName = $_GET["code"];

$graphPoverty = sprintf("SELECT year, poverty FROM ". $codeName . " ORDER BY 'year'");
  $result = $mysqli->query($graphPoverty);

  //loop through the returned data
  $povertyData = array();
    foreach ($result as $row) {
      $povertyData[] = $row;
    }

$povertyDesc = array($povertyData);

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
echo json_encode($povertyData);

?>
