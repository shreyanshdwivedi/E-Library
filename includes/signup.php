<?php

	if(isset($_POST['submit'])){

		$first_name = htmlentities($_POST['first_name']);
		$last_name = htmlentities($_POST['last_name']);
		$username = htmlentities($_POST['username']);
		$email = htmlentities($_POST['email']);
		$password = md5(htmlentities($_POST['password']));

		if(!empty($first_name) && !empty($last_name) && !empty($username) && !empty($email) && !empty($password)){

			$servername = "localhost";
			$dbname = "library";
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$query1 = $conn->prepare("SELECT * FROM users WHERE email=:email");
			$query1->execute(['email'=>$email]);
			$result1 = $query1->fetch(PDO::FETCH_ASSOC);

			$query2 = $conn->prepare("SELECT * FROM users WHERE username = :username");
			$query2->execute(['username'=>$username]);
			$result2 = $query2->fetch(PDO::FETCH_ASSOC);

			if($result1){
				echo "<script language='javascript'>";
				echo "alert('Email already registered!!');";
				echo "</script>";
				header("Refresh:1; index.php");
			}
			else if($result2){
				echo "<script language='javascript'>";
				echo "alert('Username already exists!!');";
				echo "</script>";
				header("Refresh:1; index.php");
			}
			else{
				try{
					$query = $conn->prepare("INSERT INTO users(first_name, last_name, username, email, password) VALUES(:first_name, :last_name, :username, :email, :password)");
					$res = $query->execute(['first_name'=>$first_name, 'last_name'=>$last_name, 'username'=>$username, 'email'=>$email, 'password'=>$password]);
					if($res){
						echo "<script language='javascript'>";
						echo "alert('Signed Up Successfully!!');";
						echo "</script>";
						header("Refresh:1; login.php");
					}
					else{
						echo "<script language='javascript'>";
						echo "alert('Error signing up!!');";
						echo "</script>";
						header("Refresh:1; index.php");
					}

				}

				catch(PDOException $e){
					echo $e->getMessage();
					header("Refresh:1; index.php");
				}
			}
			$conn = NULL;

		}
		else{
			echo "<script language='javascript'>";
			echo "alert('Enter all the details!!');";
			echo "</script>";
			header("Refresh:1; index.php");
		}
	}

?>