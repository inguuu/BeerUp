<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>로그인 결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');//불러오기

if(isset($_SESSION['id'])){
exit('<a href="main2.php"> 로그인정보확인</a></body></html>');
}

$dbc= mysqli_connect($host,$user,$pass,$dbname)or die("Error connect");

if(empty( $_POST['email']) || empty($_POST['pass'])){
	exit('<a href="javascript:history.go(-1)">로그인 폼을 채워주세요.</a>');
}


$email =mysqli_real_escape_string($dbc,trim($_POST['email']));
$pass =mysqli_real_escape_string($dbc,trim($_POST['pass']));



$query = "select id, email from user where email='$email' and password=SHA('$pass')";
 $result = mysqli_query($dbc, $query)or die("Error query");
 if(mysqli_num_rows($result)==1){
 $row = mysqli_fetch_assoc($result);
 $userid = $row['id'];
 $_SESSION['id']=$userid;
 setcookie('id',$row['id'],time()+(60*60*24));
  setcookie('email',$row['email'],time()+(60*60*24));
  echo "$email"."님의 로그인 성공했습니다.<br/><br/><a href='/main2.php'> 홈으로</a>";
 }
 else{
	 echo "로그인 실패.<br/><br/><a href='/main2.html'> 홈으로</a>";
 }
 mysqli_free_result($result);
 
 mysqli_query($dbc,'set names utf8');
 
 



?>
</body>
</html>