<?php
	$dbc = mysqli_connect("127.0.0.1","root","apmsetup","mybeer")
			or die("Error : connect");
			
	mysqli_query($dbc, "set names utf8");
	
	$query = "select reviewid,userid, email, memo, time from review,user where userid=user.id order by time desc ";
			
	$result = mysqli_query($dbc, $query)
			or die("Error : Query");
	
	$json = array();
	
	if (mysqli_num_rows($result))
	{
		while ($row = mysqli_fetch_assoc($result))
		{
			$json["list"][]=$row;
			
		}
		mysqli_free_result($result);
	}
	echo json_encode($json);
	
	mysqli_close($dbc);
?>