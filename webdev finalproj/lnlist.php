<?php
	include_once "utilities.php";
	
	$conn = createDatabaseConnection("localhost", "timzhen");
	
	$uname = $_POST['uname'];
	$cmd = "SELECT `lightnovels` FROM `lightnovels` WHERE `username` = '$uname'";
	
	$result = $conn->prepare($cmd);
	$result->execute();
	
	$numRows = $result->rowCount();
	for ($i = 0; $i < $numRows; $i++)
	{
		$data = $result->fetch();
		echo $data['lightnovels']."<br />"."<br />";
	}
	displayMessage("Click this to return to the adding page", "lightnovel.php?uname=$uname");
?>

