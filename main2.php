<?php 
   session_start();
   ob_start();
?>
<!DOCTYPE HTML>
<!--
	Dopetrope by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Beer up</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	
	<body class="homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<div id="header">

						<!-- Logo -->
							<h1><a>BeerUp</a></h1>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="main2.php">홈으로</a></li>
									<?php
	                                 if(!isset($_SESSION['id']))
									 echo '<li><a href="loginform.html">로그인</a></li>';
								     else
										echo '<li><a href="logout.php">로그아웃</a></li>';
							     	?>
									<li><a href="signup.html">회원가입</a></li>
									<li><a href="change.html">맥주정보관리</a></li>
								</ul>
							</nav>

						<!-- Banner -->
							<section id="banner">
								<header>
									<h2>Beer. This is Happiness.</h2>
									<p>Beer up, Cheer up</p>
								</header>
							</section>

						<!-- Intro -->
							<section id="intro" class="container">
								<div class="row">
									<div class="4u 12u(mobile)">
										<section class="first">
											<i class="icon featured fa-cog"></a></i>
											<header>
												<h2><a href="listbeerinfo.php">맥주 조회</a></h2>
											</header>
											<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="middle">
											<i class="icon featured alt fa-flash"></i>
											<header>
												<h2><a href="change2.html">리뷰 등록/삭제</a></h2>
											</header>
											<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
										</section>
									</div>
									<div class="4u 12u(mobile)">
										<section class="last">
											<i class="icon featured alt2 fa-star"></i>
											<header>
												<h2><a href="listreview.html">리뷰 게시판</a></h2>
											</header>
											<p>Nisl amet dolor sit ipsum veroeros sed blandit consequat veroeros et magna tempus.</p>
										</section>
									</div>
								</div>
								<footer>
									<ul class="actions">
										<li id="press"><a class="button big">소개글</a></li>
										<li><a href="#" class="button alt big">맨위로</a></li>
									</ul>
									<script>
		
			
			$("#press").click(function()
			{
				
				$(this).text("소개글");
				$(".text").text("페이지에 대한 글들");
				$(".text").slideToggle("slow");
				$(".text").animate(
				{
					left:"100px",
					width:"500px",
					height:"300px",
					fontSize:"20px",
					opacity:"0.1"
				})
					//.animate({width:"150px"});
				
			}); 
		
	</script> 
								</footer>
							</section>

					</div>
				</div>

			<!-- Main -->
				<div id="main-wrapper">
					<div class="container">
						<div class="row">
							<div class="12u">

								

							</div>
						</div>
						
					</div>
				</div>

			
			<div class="row">
			<div class="12u">

					<!-- Copyright -->
							<div id="copyright">
								<ul class="links">
									<li>&copy; 사이트 대표. 장인규 010-8430-1154.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
										</ul>
									</div>
							</div>
				       </div>

	
	</body>
	
</html>