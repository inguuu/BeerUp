<!DOCTYPE HTML>

<html>
<head>
	<meta charset="UTF-8"/>
	<title>맥주 리스트</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style>
		#press
		{
			background-color : blue;
			border : 2px dotted red;
			color : red;
			width : 100px;
		}
		#result
		{
			background-color : red;
			border : 3px dotted blue;
			width : 150px;
			height : 150px;
		}
		#results
		{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}
		#results td, #results th 
		{
			border: 1px solid #ddd;
			padding: 8px;
		}

		#results tr:nth-child(even){background-color: #f2f2f2;}

		#results tr:hover {background-color: #ddd;}

		#results th 
		{
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
		}
	</style>
</head>
<body>
	<h1>Beer list.</h1>
	<div id="press">데이터 로드</div>
	<table id="results">
	<tr>
		<th>이름</th>
		<th>가격</th>
		<th>도수</th>
		<th>이미지</th>
		<th>종류</th>
	</tr>
	</table>
	
	<script>
		$(document).ready(function()
		{
			$("#press").click(function()
			{
				$.getJSON("selectJson.php",
					function(json)
					{
						$(".data").remove();
						// alert(json.list.length);
						$.each(json.list,
							function()
							{
								$("#results").append(
								"<tr class='data'>" + 
								"<td>" + this["name"] + "</td>" + 
								"<td>" + this["price"] + "</td>" + 
								"<td>" + this["degree"] + "</td>" + 
							    "<td>"+"<img src="+ this['image'] + "/>" + "</td>"+
								 "<td>" + this["type"] + "</td>" + 
								"</tr>");
							});
					});
			});
		});
		
	</script>

</body>
</html>