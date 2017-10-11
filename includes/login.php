<?php

	session_start();
	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "<script>";

		header("Refresh:1; ../login.php");
	}

	if(isset($_POST['submit'])){

		$username = htmlentities($_POST['username']);
		$password = md5(htmlentities($_POST['password']));
		$user_type = htmlentities($_POST['user_type']);

		if(!empty($username) && !empty($password)){

			$servername = "localhost";
			$dbname = "library";

			if($user_type == "student"){
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$query1 = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
				$query1->execute(['username'=>$username, 'password'=>$password]);
				$res1 = $query1->fetch(PDO::FETCH_ASSOC);
			}
			else{
				$password = htmlentities($_POST['password']);

				$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$query2 = $conn->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
				$query2->execute(['username'=>$username, 'password'=>$password]);
				$res2 = $query2->fetch(PDO::FETCH_ASSOC);
			}

			if($user_type == "student" && $res1){
				$_SESSION['username'] = $username;
				$_SESSION['user_type'] = $user_type;
				$_SESSION['name'] = $res1['first_name'].' '.$res1['last_name'];
				$_SESSION['email'] = $res1['email'];
				echo "<script language='javascript'>";
				echo "alert('Logged In successfully!!');";
				echo "</script>";
				header("Refresh:1; ../member/welcome.php");
			}
			else if($user_type == "admin" && $res2){
				$_SESSION['username'] = $username;
				$_SESSION['user_type'] = $user_type;
				$_SESSION['name'] = $res2['first_name'].' '.$res2['last_name'];
				echo "<script language='javascript'>";
				echo "alert('Logged In successfully!!');";
				echo "</script>";
				header("Refresh:1; ../admin/welcome_admin.php");
			}
			else{
				echo "<script language='javascript'>";
				echo "alert('Wrong credentials!!');";
				echo "</script>";
				header("Refresh:1; ../login.php");
			}
		}
		else{
			echo "<script language='javascript'>";
			echo "alert('Enter all the details!!');";
			echo "</script>";
			header("Refresh:1; ../login.php");
		}
	}

?>