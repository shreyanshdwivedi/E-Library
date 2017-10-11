<?php

	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "<script>";

		header("Refresh:1; ../../login.php");
	}

	$servername = "localhost";
	$dbname = "library";
	$username = $_SESSION['username'];

	try{
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = $conn->prepare("SELECT * FROM book_issue_status WHERE username=:username");
		$query->execute(['username'=>$username]);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);

		if($result){
			echo '<center>';
			echo '<table class="table table-striped table-bordered text-center" style="width:50%;">';
			echo '<tr><td><b>Serial_ID</b></td>';
			echo '<td><b>Title</b></td>';
			echo '<td><b>Author</b></td>';
			echo '<td><b>Publication</b></td>';
			echo '<td><b>Status</b></td>';
			echo '<td><b>Receipt</b></td></tr>';

			foreach($result as $row){
				$serial_id = $row['book_serial_id'];

				echo '<tr><td>'.$serial_id.'</td>';
				
				$query1 = $conn->prepare("SELECT * FROM books WHERE serial_id=:serial_id");
				$query1->execute(['serial_id'=>$serial_id]);
				$res = $query1->fetch(PDO::FETCH_ASSOC);

				echo '<td>'.$res['title'].'</td>';
				echo '<td>'.$res['author'].'</td>';
				echo '<td>'.$res['publication'].'</td>';
				
				if($row['status'] == "requested"){
					echo '<td style="color:red;">Requested</td>';
					echo '<td><button type="button" class="btn btn-default btn-sm" disabled="disabled">Print Receipt</button></td></tr>';
				}
				else{
					echo '<td style="color:green;">Confirmed</td>';
					echo '<td><a href="receipt.php?id='.$serial_id.'"><button type="button" class="btn btn-primary btn-default btn-sm">Print Receipt</button></a></td></tr>';
				}
			}
			
				echo '</table></center>';
		}
		else{
			echo '<center><h4>No History!!</h4></center>';
		}
	}
	catch(PDOEception $e){
		echo $e->getMessage();
	}

?>