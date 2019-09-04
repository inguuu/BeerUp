<?php 
     session_start();
   ob_start();
?>
<html>
<head>
<title>리뷰 등록결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');


if(empty($_POST['memo'])||empty($_FILES['picture']['tmp_name'])){
	exit('<a href="main2.php">입력 폼을 채워주세요. 홈으로</a></body></html>');
}
if(!isset($_FILES['picture'])){
	exit('<a href="javascript::history.go(-1)">이미지 업로드 에러</a></body></html>');
}

$imagepath ="./images/".uniqid("img") . "." .pathinfo($_FILES['picture']['name'],PATHINFO_EXTENSION);

if(!move_uploaded_file($_FILES['picture']['tmp_name'],$imagepath)){
	exit('<a href="javascript:history.go(-1)"> 이미지 에러</a>');
}

$dbc = mysqli_connect($host, $user, $pass, $dbname) 
or die("Error Connecting to MySQL Server.");

$id= $_SESSION['id'];

$memo= mysqli_real_escape_string($dbc,trim($_POST['memo']));


mysqli_query($dbc,'set name utf8');

$query= "insert into review values (null,$id,NOW(),'$imagepath','$memo')";

$result= mysqli_query($dbc,$query)or die("Error Querying");
mysqli_close($dbc);
echo "<img src='$imagepath'/>"; 
echo"리뷰등록완료</br></br>";
echo'<a href="listreview.html">리뷰 보러가기</a>';

?>
</body>
</html>