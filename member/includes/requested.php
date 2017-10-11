<?php

	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "<script>";

		header("Refresh:1; ../../login.php");
	}

	$servername = "localhost";
	$dbname = "library";
	$requested_by = $_SESSION['username'];
	$status = "pending";

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = $conn->prepare("SELECT * FROM requested_books WHERE requested_by=:requested_by AND status=:status");
		$query->execute(['requested_by'=>$requested_by, 'status'=>$status]);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		if($result){
			echo '<center>';
			echo '<table class="table table-striped table-bordered text-center" style="width:50%;">';
			echo '<tr><td><b>Serial_ID</b></td>';
			echo '<td><b>Title</b></td>';
			echo '<td><b>Author</b></td>';
			echo '<td><b>Publication</b></td>';
			echo '<td><b>Requested On</b></td></tr>';

			foreach($result as $row){
				$serial_id = $row['book_id'];

				echo '<tr><td>'.$serial_id.'</td>';
				
				$query1 = $conn->prepare("SELECT * FROM books WHERE serial_id=:serial_id");
				$query1->execute(['serial_id'=>$serial_id]);
				$res = $query1->fetch(PDO::FETCH_ASSOC);

				echo '<td>'.$res['title'].'</td>';
				echo '<td>'.$res['author'].'</td>';
				echo '<td>'.$res['publication'].'</td>';

				echo '<td>'.$row['request_date'].'</td></tr>';
			}
			echo '</table></center>';
		}
		else{
			echo '<center><h4>No book requested!!</h4></center>';
		}
	}
	catch(PDOEception $e){
		echo $e->getMessage();
	}

?>