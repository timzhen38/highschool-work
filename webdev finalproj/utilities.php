<!DOCTYPE html>
<!-- Tim Zhen -->
<html>
	<head>
		<title></title>
		<style> </style>
		<script>
			function initialize()
			{
		
			}
	
		</script>
	</head> 
	<body onload = "initialize();">
		<?php
			function displayMessage($msg, $url)
			{
				echo "<a href = '$url'> $msg </a>";
			}
			
			function createDatabaseConnection($hostname, $db)
			{
				return new PDO("mysql:host=$hostname;dbname=$db","root", "");
			}
		?>
	</body>
</html>