<?php 
     session_start();
   ob_start();
?>
<html>
<head>
<title>리뷰 삭제결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');


if(empty($_POST['reviewid'])){
	exit('<a href="deleteviewform.php">입력 폼을 채워주세요. 돌아가기</a></body></html>');
}


$dbc = mysqli_connect($host, $user, $pass, $dbname) 
or die("Error Connecting to MySQL Server.");

$id= $_SESSION['id'];
$reviewid= mysqli_real_escape_string($dbc,trim($_POST['reviewid']));


mysqli_query($dbc,'set name utf8');

$query= "delete from review where reviewid='$reviewid'";

$result= mysqli_query($dbc,$query)or die("Error Querying");
mysqli_close($dbc);
echo"리뷰삭제완료</br></br>";
echo'<a href="listreview.html">리뷰 보러가기</a>';

?>
</body>
</html>