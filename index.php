<?php
	session_start();
	if(isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Already logged in!!');";
		echo "</script>";
		
		if($_SESSION['user_type'] = "student")
			header("Refresh:1; member/welcome.php");
		else{
			header("Refresh:1; admin/welcome_admin.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/73608a93c8.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/style.css">
</head>

<body class="text-center">

	<nav class="navbar navbar-default navbar-fixed-top opaque-navbar" style="background-color: #1a1a1a;">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style="cursor: pointer; color: #ffffff; font-size: 30px;">
          LOGO
        </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php" style="color: #ffffff;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	      <li><a href="login.php" style="color: #ffffff;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
        </div>
      </div>
    </nav>
    <div style="height: 50px;"></div>

    <h2> Sign Up Here!! </h2>
    <br/>
	<form method="post" action="index.php">
	  <div class="form-group">
	    <label for="first_name">First Name</label>
	    <input type="text" class="form-control" name="first_name" placeholder="First Name">
	  </div>
	  <div class="form-group">
	    <label for="last_name">Last Name</label>
	    <input type="text" class="form-control" name="last_name" placeholder="Last Name">
	  </div>
	  <div class="form-group">
	    <label for="username">Username</label>
	    <input type="text" class="form-control" name="username" placeholder="Username">
	  </div>
	  <div class="form-group">
	    <label for="email">Email address</label>
	    <input type="email" class="form-control" name="email" placeholder="Email">
	  </div>
	  <div class="form-group">
	    <label for="password">Password</label>
	    <input type="password" class="form-control" name="password" placeholder="Password">
	  </div>
	  <button type="submit" class="btn btn-primary btn-default" name="submit">Submit</button>
	</form>

	<?php
		include('includes/signup.php');
	?>	
</body>
</html>