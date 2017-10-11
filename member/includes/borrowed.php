<?php

	session_start();
	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Log In first!!');";
		echo "<script>";

		header("Refresh:1; ../../login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<link rel="stylesheet" href="css/style.css">
</head>

<body class="text-center">
	<nav class="navbar navbar-default navbar-fixed-top opaque-navbar">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="../welcome.php" style="cursor: pointer; color: #e44c65; font-size: 30px;">
          LOGO
        </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="includes/borrowed.php" style="color: #ffaaaa;">Books-Borrowed</a></li>
	      <li><a href="../profile.php" style="color: #ffaaaa;"><?php echo $_SESSION['username']; ?></a></li>
	      <li><a href="includes/logout.php" style="color: #ffaaaa;">Logout</a></li>
        </ul>
        </div>
      </div>
    </nav>
    <div style="height: 100px;"></div>


<?php

	try{
		$servername = "localhost";
		$dbname = "library";

		$conn = new PDO("mysql:host=$servername;dbname=$dbname", "root", "");

		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$query = $conn->prepare("SELECT * FROM books WHERE alloted_to = :alloted_to");
		$query->execute(['alloted_to'=>$_SESSION['username']]);
		$result = $query->fetchAll(PDO::FETCH_ASSOC);
		if($result){
					echo '<center>';
					echo '<table class="table table-striped table-bordered text-center" style="width:50%;">';
					echo '<tr><td><b>Title</b></td>';
					echo '<td><b>Author</b></td>';
					echo '<td><b>Publication</b></td>';
					echo '<td><b>From</b></td>';
					echo '<td><b>To</b></td></tr>';
					foreach($result as $row){
						echo '<tr><td>'.$row['title'].'</td>';
						echo '<td>'.$row['author'].'</td>';
						echo '<td>'.$row['publication'].'</td>';
						echo '<td>'.$row['from_date'].'</td>';
						echo '<td>'.$row['to_date'].'</td></tr>';
					}
					echo '</table></center>';
		}
		else{
			echo '<center><h3>No books issued!! </h3></center>';
		}
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}

?>

</body>
</html>