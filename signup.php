<!DOCTYPE html>
<html>
<head>
<title>회원가입결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');//불러오기
$dbc= mysqli_connect($host,$user,$pass,$dbname)or die("Error connect");

if(empty( $_POST['email']) || empty($_POST['pass']) || empty( $_POST['passcon'])){
	exit('<a href="javascript:history.go(-1)"> 폼을 채워주세요.</a>');
}


$email =mysqli_real_escape_string($dbc,trim($_POST['email']));
$pass =mysqli_real_escape_string($dbc,trim($_POST['pass']));
$passcon =mysqli_real_escape_string($dbc,trim($_POST['passcon']));


$query = "select id from user where email='$email'";
 $result = mysqli_query($dbc, $query)or die("Error query");
 if(mysqli_num_rows($result)!=0){
 exit('<a href="javascript:history.go(-1)"> 이미등록된 email입니다.</a>');
 }
 mysqli_free_result($result);
 
 mysqli_query($dbc,'set names utf8');
 
 $query = "insert into user values(null,'$email',SHA('$pass'))";
 
 $result= mysqli_query($dbc,$query) or die("Error Querying database");
 mysqli_close($dbc);
 echo "$email"."님의 회원가입 성공했습니다.<br/><br/>";
 echo '<a href="/main2.php"> 홈으로</a>'



?>
</body>
</html>