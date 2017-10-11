<?php include('header.php'); ?>

            <div class="col-md-10">
            	<div style="height: 100px;"></div>
            	<center>
            	<form method="post" action="change_pass.php">
				  <div style="height: 20px;"></div>
				  <div class="form-group">
				    <label for="old_password">Old Password</label>
				    <input type="password" class="form-control" name="old_password" placeholder="Old Password" style="width: 50%;">
				  </div>
				  <div class="form-group">
				    <label for="new_password">New Password</label>
				    <input type="password" class="form-control" name="new_password" placeholder="New Password" style="width: 50%;">
				  </div>
				  <div class="form-group">
				    <label for="confirm_password">New Password</label>
				    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" style="width: 50%;">
				  </div>
				  <button type="submit" class="btn btn-primary btn-default" name="submit" id="submit">Change Password</button>
				</form>
				</center>

            	<?php include('includes/change_pass.php'); ?>
            </div>
        </div>
    </div>

</body>
</html>