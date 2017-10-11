<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Your Profile</title>
</head>
<body>
	<form method="post" action="edit_profile.php">
		<input type="text" class="form-control" placeholder="<?php echo $_SESSION['username']; ?>" name="name" style="width: 50%;">
		<input type="text" class="form-control" placeholder="<?php echo $_SESSION['email']; ?>" name="email" style="width: 50%;" disabled="true">
		<input type="text" class="form-control" placeholder="<?php echo $_SESSION['name']; ?>" name="username" style="width: 50%;">
		<button type="submit" class="btn btn-primary btn-default" name="submit">Save Changes</button>
	</form>
</body>
</html>