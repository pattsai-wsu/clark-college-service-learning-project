<?php
include 'mysqlConnect.php';
?>

<!DOCTYPE html>
<head>
<title>Interactive Country Data</title>

<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
<div id="map"><img src="../img/world-map.png" /></div>


<!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openIssue(event, 'Countries')">Countries</button>
</div>

<!-- Tab content -->
<div id="Countries" class="tabcontent">
<span onclick="this.parentElement.style.display='none'">x</span>
<br/>

<?php
$result = $mysqli->query("SHOW TABLES FROM countrydata");
while($tableName = mysqli_fetch_row($result))
{
  $table=$tableName[0];
//  echo '<p><a href="">'.$table.'</a></p>';
  $result2 = $mysqli->query("SELECT * FROM ".$table. " WHERE year='2000'");
if ($result2->num_rows > 0) {
    // output data of each row
    while($row3 = $result2->fetch_assoc()) {
        echo "<div style='height:75px;width:120px;border:1px solid #000;float:left;text-align:center;'><a href='country.php?code=" . $table . "&country=" . $row3["country"] ."'>" . $row3["country"] . "</a></div>";
    }
}
else {
    echo "0 results";
}
}
?>

</div>

<script src="/javascript/jquery/jquery.js"></script>
<script src="/javascript/tabs.js"></script>

</body>
</html>
