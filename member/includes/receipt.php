
<?php
	
	$serial_id = $_GET['id'];
	$servername = "localhost";
	$dbname = "library";
	$username = $_SESSION['username'];
//	$status = "confirmed";

	$dbc = mysqli_connect("localhost", "root", "", "library") or die("Error");
	$query = "SELECT * FROM book_issue_status WHERE username='$username' AND book_serial_id='$serial_id' AND status='confirmed'";

	$res = mysqli_query($dbc, $query) or die("Error querying 1");
	$row = mysqli_fetch_assoc($res);

		if($row){

			$from_date = $row['issue_date'];
			$to_date = $row['to_date'];

			$query1 = "SELECT * FROM books WHERE serial_id='$serial_id'";

			$res1 = mysqli_query($dbc, $query1) or die("Error querying");
			$row1 = mysqli_fetch_assoc($res1);

			$title = $row1['title'];
			$author = $row1['author'];
			$publication = $row1['publication'];		

?>

	<div>
		<center>
		<h4>Receipt</h4>
		<a href="javascript:window.print()">Click to print</a>
		<div style="height: 50px;"></div>
		<table class="table table-striped table-bordered text-center" style="width: 50%;">
			<tr>
				<th>Name Of Student</th>
				<td><?php echo $_SESSION['name']; ?></td>
			</tr>
			<tr>
				<th>Serial ID of book</th>
				<td><?php echo $serial_id; ?></td>
			</tr>

			<tr>
				<th>Title Of Book</th>
				<td><?php echo $title; ?></td>
			</tr>

			<tr>
				<th>Author Of Book</th>
				<td><?php echo $author; ?></td>
			</tr>

			<tr>
				<th>Publication Of Book</th>
				<td><?php echo $publication; ?></td>
			</tr>

			<tr>
				<th>From</th>
				<td><?php echo $from_date; ?></td>
			</tr>
			<tr>
				<th>To</th>
				<td><?php echo $to_date; ?></td>
			</tr>
			
		</table>
		</center>
	</div>    

<?php
		}
?>
