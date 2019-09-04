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

if(empty( $_POST['name']) || empty($_POST['price']) || empty( $_POST['degree'])){
	exit('<a href="javascript:history.go(-1)"> 폼을 채워주세요.</a>');
}
if(!isset($_FILES['beerimg'])){
	 exit('<a href="javascript:history.go(-1)"> 이미지 업로드 에러</a>');
 }
 
 $imagepath ="./images/".uniqid("img") . "." .pathinfo($_FILES['beerimg']['name'],PATHINFO_EXTENSION);

if(!move_uploaded_file($_FILES['beerimg']['tmp_name'],$imagepath)){
	exit('<a href="javascript:history.go(-1)"> 이미지 에러</a>');
}

$name=mysqli_real_escape_string($dbc,trim($_POST['name']));
$price=mysqli_real_escape_string($dbc,trim($_POST['price']));
$degree=mysqli_real_escape_string($dbc,trim($_POST['degree']));

$type=mysqli_real_escape_string($dbc,trim($_POST['type']));

 mysqli_query($dbc,'set names utf8');


 $query = "insert into beerinfo values ('$name', $price, $degree,null,'$imagepath')";
 $result= mysqli_query($dbc,$query) or die("Error Querying database");

 $query = "insert into beertype values ('$name','$type')";
 $result= mysqli_query($dbc,$query) or die("Error Querying database");
  mysqli_close($dbc);
  
  echo "<img src='beerimage.php?name=$name' alt='Beer Image' style='width:80px;height:80px;'/><br/>";
echo"등록완료";



?>
</body>
</html>