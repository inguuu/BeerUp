<?php 
     session_start();
   ob_start();
?>
<html>
<head>
<title>댓글 등록 결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');

/*if(!isset($_SESSION['id'])){
	exit('<a href="main2.php">로그인 상태가 아닙니다. 홈으로</a></body></html>');
}*/
if(empty($_POST['memo'])){
	exit('<a href="writereplyform.php">입력 폼을 채워주세요. 돌아가기</a></body></html>');
}


$dbc = mysqli_connect($host, $user, $pass, $dbname) 
or die("Error Connecting to MySQL Server.");

$id= $_SESSION['id'];
$reviewid= mysqli_real_escape_string($dbc,trim($_POST['reviewid']));
$memo= mysqli_real_escape_string($dbc,trim($_POST['memo']));


mysqli_query($dbc,'set name utf8');

$query= "insert into reply values (null,$reviewid,$id,NOW(),'$memo')";

$result= mysqli_query($dbc,$query)or die("Error Querying");
mysqli_close($dbc);
echo"댓글등록완료</br></br>";
echo'<a href="listreview.html">뒤로</a>';

?>
</body>
</html>