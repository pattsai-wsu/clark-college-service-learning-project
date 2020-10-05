<?php
header('Content-Type: application/json');
include 'mysqlConnect.php';                                            
                                                                       
$countryName = $_GET["country"];                                       
$codeName = $_GET["code"];                                             
                                                                       
$graphExport = sprintf("SELECT year, export FROM ". $codeName . " ORDER BY 'year'"); 
  $result = $mysqli->query($graphExport);                              
  
  //loop through the returned data                                     
  $exportData = array();
    foreach ($result as $row) {                                        
      $exportData[] = $row;
    } 
    
$exportDesc = array($exportData);                                      

//free memory associated with result                                   
$result->close();

//close connection                                                     
$mysqli->close();

//now print the data                                                   
echo json_encode($exportData);                                         

?> 
