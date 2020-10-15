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
			$conn = new PDO("mysql:host=$hostname;dbname=$db","root", "");
			//$conn.setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if (array_key_exists("newuser", $_POST))
			{
				registerNewUser($_POST['username'], $_POST['password']);
			}
			else
			{
				loginUser($_POST['username'], $_POST['password']);
			}
			
			function registerNewUser($uname, $pword)
			{
				global $conn;
				
				$cmd = "SELECT * FROM `simpleusers` WHERE `username` = '$uname'";
				$result = $conn->prepare($cmd);
				$result->execute();
				
				if ($result->rowCount() > 0)
				{
					echo "That username already exists." . "<br />";
					displayMessage("Click here to go back to the log in screen", "index.html");
				}
				else
				{
					$cmd = "INSERT INTO `simpleusers` VALUES ('$uname', '$pword')";
					echo $cmd . "<br />";
					$result = $conn->prepare($cmd);
					$result->execute();
					displayMessage("User successfully added.");					
				}
			}
			
			function loginUser($uname, $pword)
			{
				global $conn;
				
				$cmd = "SELECT `password` FROM `simpleusers` WHERE `username` = '$uname'";
				$result = $conn->prepare($cmd);
				$result->execute();
				
				if ($result->rowCount() == 0)
				{
					displayMessage("Username or Password is incorrect.", "index.html");
				}
				else
				{
					$data = $result->fetch();
					if ($data['password'] == $pword)
					{
						echo "Welcome back, $uname!" . "<br />" . "<br />" . "What would you like to do today?" . "<br />" . "<br />";
						displayMessage("Add a light novel that I have recently read", "lightnovel.php?uname=$uname");
						echo "<br />";
						displayMessage("Go to Reddit", "https://www.reddit.com/");
						echo "<br />";
						displayMessage("Go to Tyler1's youtube channel!", "https://www.youtube.com/channel/UCwV_0HmQkRrTcrReaMxPeDw");
						echo "<br />" . "<br />" . "<br />";
						displayMessage("Go back to the log in screen", "index.html");
					}
					else
					{
						echo "Username or Password is incorrect!" . "<br />";
						displayMessage("Click here to go back to the log in screen", "index.html");
					}
				}
			}	
			
		?>
	</body>
</html>