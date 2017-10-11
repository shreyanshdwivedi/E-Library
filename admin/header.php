<?php
	session_start();
	if(!isset($_SESSION['username'])){
		echo "<script language='javascript'>";
		echo "alert('Login First!!');";
		echo "<script>";

		header("Refresh:1; ../login.php");
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://use.fontawesome.com/73608a93c8.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="css/style.css">
</head>

<body style="overflow-x: hidden;">

	<nav class="navbar navbar-default navbar-fixed-top opaque-navbar" style="background-color: #1a1a1a;">
      <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="welcome.php" style="cursor: pointer; color: #ffffff; font-size: 30px; margin-left: -100px;">
          LOGO
        </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
	      <li><a href="welcome.php" style="color: #ffffff;"><?php echo $_SESSION['username']; ?></a></li>
	      <li><a href="includes/logout.php" style="color: #ffffff;">Logout</a></li>
        </ul>
        </div>
      </div>
    </nav>
    <div style="height: 50px;"></div>

    <div>
        <div class="row">
            <div class="col-md-2" style="background-color: #1a1a1a; height: 92.5vh; overflow: hidden;">
                <div class="dashboard" style="position: fixed;">
                    <div class="profile_pic" style="margin-top: 25px; margin-left: 25px;">
                        <img src="sd4.jpg" height="100px" width="100px" style="border-radius: 50%; border: 2px solid white;">
                    </div>
                    <hr style="border-color: white;" width="150%">
                    <div style="margin-top: 25px; margin-left: 25px;">
                        <div style="font-size: 15px;">
                            <a href="books.php" style="color: white; text-decoration: none;">
                              <i class="fa fa-list" aria-hidden="true" style="color: white; font-size: 20px;"></i> &nbsp Dashboard
                            </a><br/><br/>
                            <a href="history.php" style="color: white; text-decoration: none;">
                              <i class="fa fa-retweet" aria-hidden="true" style="color: white; font-size: 20px;"></i> &nbsp General Settings
                            </a><br/><br/>
                            <a href="requested.php" style="color: white; text-decoration: none;">
                              <i class="fa fa-book" aria-hidden="true" style="color: white; font-size: 20px;"></i> &nbsp Books
                            </a><br/><br/>
                            <a href="change_pass.php" style="color: white; text-decoration: none;">
                              <i class="fa fa-key" aria-hidden="true" style="color: white; font-size: 20px;"></i> &nbsp Members
                            </a><br/><br/>
                            <a href="change_pass.php" style="color: white; text-decoration: none;">
                              <i class="fa fa-key" aria-hidden="true" style="color: white; font-size: 20px;"></i> &nbsp Circulation
                            </a><br/><br/>
                            <a href="change_pass.php" style="color: white; text-decoration: none;">
                              <i class="fa fa-key" aria-hidden="true" style="color: white; font-size: 20px;"></i> &nbsp Notification
                            </a><br/><br/>
                            <a href="change_pass.php" style="color: white; text-decoration: none;">
                              <i class="fa fa-key" aria-hidden="true" style="color: white; font-size: 20px;"></i> &nbsp Requested Books
                            </a><br/><br/>
                        </div>
                    </div>
                </div>
            </div>