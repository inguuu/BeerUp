<?php 
   session_start();
   ob_start();
?>
<html>
<head>
<title>리뷰 삭제</title>
<meta charset="utf-8"/>
</head>
<body>
<?php

if(!isset($_SESSION['id'])){
exit('<a href="loginform.html">로그인 상태가 아닙니다. 로그인화면으로</a></body></html>');
 
}

?>	

<h1>리뷰 삭제</h1>
<form method="post" enctype="multipart/form-data" action="deletereview.php">

삭제할 게시글 번호를 입력하시오:<br/>
<input text="file" name="reviewid"/>
<br/>
<br/>
<input type= "submit" value = "리뷰 삭제"/>
</form>
</body>
</html>
	