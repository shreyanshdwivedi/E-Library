<?php
	session_start();
	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "<script>";

		header("Refresh:1; welcome.php");
	}

?>

