<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>로그아웃 결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');//불러오기

if(!isset($_SESSION['id'])){
exit('<a href="main2.php"> 로그인 상태가 아닙니다.</a></body></html>');
}
$_SESSION =array();

if(isset($_COOKIE[session_name()])){
	setcookie(session_name(),'',time()-(60*60));
}
session_destroy();

setcookie('id','',time()-(60*60));
setcookie('email','',time()-(60*60));

echo '로그아웃<a href="main2.php">홈으로</a>';


?>
</body>
</html>