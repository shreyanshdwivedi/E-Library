<div style="height: 100px;"></div>
<center>
	<form method="post" action="books.php">
	  	<label class="radio-inline">
		  <input type="radio" name="search_type" value="title" checked> Title
		</label>
		<label class="radio-inline">
		  <input type="radio" name="search_type" value="author"> Author
		</label>
		<label class="radio-inline">
		  <input type="radio" name="search_type" value="publication"> Publication
		</label>
		<div style="height: 40px;"></div>
	  <input type="text" class="form-control" placeholder="Search Book.." name="book" style="width: 50%;">
	  <div style="height: 25px;"></div>
	  <button type="submit" class="btn btn-primary btn-default" name="submit">Search</button>
	</form>
</center>
