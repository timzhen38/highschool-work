<!DOCTYPE html>
<!-- Tim Zhen -->
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="tyler1.css">
		<style> </style>
		<script>
			function initialize()
			{
		
			}
	
		</script>
	</head> 
	<body onload = "initialize();">
		<?php
			include_once "utilities.php";
			
			$hostname = "localhost";
			$db = "timzhen";
			$conn = new PDO("mysql:host=$hostname;dbname=$db","root","");
			
			$uname = $_POST['uname'];
			$lightnovel = $_POST['lightnovel'];
	
			$cmd = "SELECT * FROM `lightnovels` WHERE `username` = '$uname' AND `lightnovels` = '$lightnovel'";
			$result = $conn->prepare($cmd);
			$result->execute();
			
			if ($result->rowCount() > 0)
			{
				echo "You've already added $lightnovel!" . "<br />";
				displayMessage("Click here to go back", "lightnovel.php?uname=$uname");
			}
			else
			{
				$cmd = "INSERT INTO `lightnovels` VALUES ('$uname', '$lightnovel')";
				$result = $conn->prepare($cmd);
				$result->execute();
				echo "$lightnovel successfully added!" . "<br />";
				displayMessage("Click here to go back", "lightnovel.php?uname=$uname");
			}
		?>
	</body>
</html>