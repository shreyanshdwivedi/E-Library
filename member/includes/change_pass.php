<?php

	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "<script>";

		header("Refresh:1; ../../login.php");
	}

	if(isset($_POST['submit'])){

		$old_pwd = md5(htmlentities($_POST['old_password']));
		$new_pwd = md5(htmlentities($_POST['new_password']));
		$confirm_pwd = md5(htmlentities($_POST['confirm_password']));

		if(!empty($old_pwd) && !empty($new_pwd) && !empty($confirm_pwd)){

			$servername = "localhost";
			$dbname = "library";
			$username = $_SESSION['username'];

			try{
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$query = $conn->prepare("SELECT * FROM users WHERE username=:username");
				$query->execute(['username'=>$username]);
				$row = $query->fetch(PDO::FETCH_ASSOC);

				if($old_pwd == $row['password']){
					if($new_pwd == $confirm_pwd){
						echo "<script language='javascript'>";
						echo "alert('Your password has been successfully changed!!');";
						echo "<script>";

						header("Refresh:1; change_pass.php");
					}
					else{
						echo "<script language='javascript'>";
						echo "alert('Please enter same NEW PASSWORD and CONFIRM PASSWORD!!');";
						echo "<script>";

						header("Refresh:1; change_pass.php");
					}
					
				}
				else{
					echo "<script language='javascript'>";
					echo "alert('Wrong Password entered!!');";
					echo "<script>";

					header("Refresh:1; change_pass.php");
				}
			}
			catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		else{
			echo "<script language='javascript'>";
			echo "alert('Please enter all the credentials!!');";
			echo "<script>";

			header("Refresh:1; change_pass.php");
		}
	}

?>