<?php
	session_start();
	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "<script>";

		header("Refresh:1; ../../login.php");
	}
	if(session_destroy()){
		echo '<script language="javascript">';
		echo 'alert("Logged Out Successfully");';
		echo '</script>';
		header("Location: ../../login.php");
	}

?>