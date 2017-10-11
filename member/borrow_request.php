<?php
	session_start();

	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "</script>";

		header("Refresh:1; login.php");
	}

	$book_serial_id = $_GET['id'];
	$status = "requested";
	$username = $_SESSION['username'];
	$request_date =(string)date('d-m-Y');

	$dbc = mysqli_connect("localhost", "root", "", "library") or die("Error");
	$query = "INSERT INTO book_issue_status(book_serial_id, username, status, request_date) VALUES( '$book_serial_id', '$username', '$status', '$request_date')";

	$res = mysqli_query($dbc, $query) or die("Error querying");

	if($res){
		echo "<script language='javascript'>";
		echo "alert('Requested!!');";
		echo "</script>";

		header("Refresh:1; welcome.php");
	}
	else{
		echo "<script language='javascript'>";
		echo "alert('Error!!');";
		echo "</script>";

		header("Refresh:1; welcome.php");
	}

	mysqli_close($dbc);

?>
