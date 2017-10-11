<?php

	if(isset($_POST['submit'])){

		$book = htmlentities($_POST['book']);
		$search_type = htmlentities($_POST['search_type']);
		$username = $_SESSION['username'];

		if(!empty($book)){
			
			$conn = mysqli_connect("localhost", "root", "", "library")
						or die('Error connecting database');;

			if($search_type == "title")
				$query = "SELECT * FROM books WHERE title like '%$book%' ORDER BY title";
			else if($search_type == "author")
				$query = "SELECT * FROM books WHERE author like '%$book%' ORDER BY title";
			else
				$query = "SELECT * FROM books WHERE publication like '%$book%' ORDER BY title";


			$result = mysqli_query($conn, $query) or die("Error!!");

					if($result){
						echo '<center><h4>Search results for '.$search_type.' with "'.$book.'"</h4></center><br/>';
						echo '<center>';
						echo '<table class="table table-striped table-bordered text-center" style="width:75%;">';
						echo '<tr><td><b>Serial_ID</b></td>';
						echo '<td><b>Title</b></td>';
						echo '<td><b>Author</b></td>';
						echo '<td><b>Publication</b></td>';
						echo '<td><b>Availability</b></td>';
						echo '<td><b>Issue book</b></td></tr>';
						foreach($result as $row){
							$serial_id = $row['serial_id'];

							echo '<tr><td>'.$serial_id.'</td>';
							echo '<td>'.$row['title'].'</td>';
							echo '<td>'.$row['author'].'</td>';
							echo '<td>'.$row['publication'].'</td>';

							$query = "SELECT * FROM requested_books WHERE book_id = '$serial_id' AND requested_by = '$username' AND status='pending'";
							$res = mysqli_query($conn, $query);

							if($res){
								echo '<td style="color:blue;">Requested</td>';
								echo '<td><button type="button" class="btn btn-info btn-sm">Requested</button></td></tr>';
							}
							else if($row['status'] == "unavailable"){
								echo '<td style="color:red;">Unavailable</td>';
								echo '<td><button type="button" class="btn btn-default btn-sm" disabled="disabled">Unavailable</button></td></tr>';
							}
							else if($row['status'] == "available"){
								echo '<td style="color:green;">Available</td>';
								echo '<td><a href = "borrow_request.php?id='.$row['serial_id'].'"><button type="button" class="btn btn-success btn-sm">Borrow</button></a></td></tr>';
							}
						}
						echo '</table></center>';
					}
					else
						echo '<h4>No result found!!</h4>';
					
					mysqli_close($conn);
		}
		else{
			echo "<h4>Enter the search value</h4>";
		}

	}

?>