<?php
  header('Content-Type: application/json;charset=UTF-8');
 
 $dbc = mysqli_connect("127.0.0.1","root","apmsetup","mybeer")
			or die("Error : connect");

mysqli_query($dbc,'set name utf8');
	$query = "select reviewid,userid, email, memo, time,picture from review,user where userid=user.id order by time desc ";
	
	$result = mysqli_query($dbc, $query)
			or die("Error : Query");
			
	$json=array();
	
	while($row=mysqli_fetch_assoc($result)){
		$replyquery="select replyid, userid, email, memo ,time from reply, user where reviewid = $row[reviewid] and user.id=reply.userid order by time desc"; 
		$replyresult = mysqli_query($dbc,$replyquery)or die("Error Querying Reply");
		$replyjson = array();
		
		while($replyrow=mysqli_fetch_assoc($replyresult)){
			$replyjson['reply'][]=$replyrow;
		}
		$json['review'][]=$row+$replyjson;
		
		mysqli_free_result($replyresult);
		
	}
	mysqli_free_result($result);
	mysqli_close($dbc);
	
	echo json_encode($json);
?>