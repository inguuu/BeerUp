<!DOCTYPE html>
<html>
<head>
<title>맥주 입력 결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');//불러오기
$dbc= mysqli_connect($host,$user,$pass,$dbname)or die("Error connect");

if(empty( $_POST['name'])){
	exit('<a href="javascript:history.go(-1)"> 폼을 채워주세요.</a>');
}

$name=mysqli_real_escape_string($dbc,trim($_POST['name']));


 mysqli_query($dbc,'set names utf8');


 $query = "delete from beerinfo where name ='$name' ";
 $result= mysqli_query($dbc,$query) or die("Error Querying database");

 $query = "delete from beertype where name ='$name' ";
 $result= mysqli_query($dbc,$query) or die("Error Querying database");
  mysqli_close($dbc);
  
  
echo"삭제완료";



?>
</body>
</html>