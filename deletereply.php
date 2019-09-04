
<html>
<head>
<title>댓글 삭제결과</title>
<meta charset="utf-8"/>
</head>
<body>
<?php
require_once('dbbeer.php');

$dbc = mysqli_connect($host, $user, $pass, $dbname) 
or die("Error Connecting to MySQL Server.");

$replyid = $_GET['replyid'];
mysqli_query($dbc,'set name utf8');

$query= "delete from reply where replyid='$replyid'";

$result= mysqli_query($dbc,$query)or die("Error Querying");
mysqli_close($dbc);
echo"댓글삭제완료</br></br>";
echo'<a href="listreview.html">리뷰 보러가기</a>';

?>
</body>
</html>