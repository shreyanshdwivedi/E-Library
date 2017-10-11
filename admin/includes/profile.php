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

		$query = $conn->prepare("SELECT * FROM admin WHERE username = :username");
		$query->execute(['username'=>$username]);
		$row = $query->fetch(PDO::FETCH_ASSOC);

		if($row){
			?>

			<table class="table table-striped text-center">
				<tr>
					<td><b> NAME :</b></td>
					<td> <?php echo $_SESSION['name']; ?> </td>
				</tr>
				<tr>
					<td><b> EMAIL ID :</b></td>
					<td> <?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<td><b> USERNAME :</b></td>
					<td> <?php echo $row['username']; ?></td>
				</tr>
			</table>

			<?php
		}
	}

	catch(PDOException $e){
		echo $e->getMessage();
	}
	$conn = NULL;

?>