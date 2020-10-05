<?php
header('Content-Type: application/json');
include 'mysqlConnect.php';                                            
                                                                       
$countryName = $_GET["country"];                                       
$codeName = $_GET["code"];                                             
                                                                       
$graphImport = sprintf("SELECT year, import FROM ". $codeName . " ORDER BY 'year'"); 
  $result = $mysqli->query($graphImport);                              
  
  //loop through the returned data                                     
  $importData = array();
    foreach ($result as $row) {                                        
      $importData[] = $row;
    } 
    
$importDesc = array($importData);                                      

//free memory associated with result                                   
$result->close();

//close connection                                                     
$mysqli->close();

//now print the data                                                   
echo json_encode($importData);                                         

?> 

