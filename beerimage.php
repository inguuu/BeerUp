<?php
header('Content-Type: image/jpg');
?>

<?php
require_once('dbbeer.php');//불러오기

$dbc= mysqli_connect($host,$user,$pass,$dbname)or die("Error connect");

$name=$_GET['name'];

 $query = "select image from beera where name='$name'";

$result = mysqli_query($dbc, $query)or die("Error query");

$row = mysql_fetch_row($result);

echo $row[0];

mysqli_free_result($result);

 mysqli_query($dbc,'set names utf8');


?>
