<!DOCTYPE HTML>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="tyler1.css">
		<script>
			function initialize()
			{
				<?php 
					$uname = $_GET['uname'];
				?>
				document.getElementById("novelname").value = <?php echo "'$uname'"; ?>;
				document.getElementById("listuname").value = <?php echo "'$uname'"; ?>;
			}
		</script>
	</head>
	<body onload = "initialize();">
		<form method = "post" action = "addln.php">
			I've read: <input type = "text" name = "lightnovel" />
			<input id = "novelname" type = "hidden" name = "uname" />
			<input type = "submit" />
		</form>
		<hr />
		<form method = "post" action = "lnlist.php">
			<input id = "listuname" type = "hidden" name = "uname" />
			<input type = "submit" value = "All of the light novels I have read" />
		</form>
		<input type = "
	</body>
</html>