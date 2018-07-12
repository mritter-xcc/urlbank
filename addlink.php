<!DOCTYPE html>
<html>
<head>
	<title>URL B@nk</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>URL B@nk - Add New Link</h1>
	<form action="" method="post">
	  	<fieldset>
		<legend>Add new item</legend>
			<label for="address">Address:</label>
			<input type="text" name="address" id="address" required="required" placeholder="Webstie URL" autofocus/>
			<label for="sitename">Site Name:</label>
			<input type="text" name="sitename" id="sitename" required="required" placeholder="Name of webstie"/>
			<label for="date">Date Added:</label>
			<input type="date" name="date" id="date" required="required" value="<?php echo date("Y-m-d");?>"/>
			<label for="category">Category:</label>
			<input type="text" name="category" id="category" required="required" placeholder="Category of website"/>
			<label for="person">Person Adding:</label>
			<input type="text" name="person" id="person" placeholder="Person adding entry"/>
			<label for="description">Description:</label>
			<textarea name="description" id="description" cols="60" row="5">
			</textarea><br>
			<input type="submit" value="Submit" name="add"/>
		</fieldset>
	</form>
	<p>[<a href="index.html">Home</a>]</p>
	<footer>A PHP Learning Exercise | &copy M Ritter - 2018</footer>

	//PHP code to add form data to database
	<?php
	//if the address field contains data, run the code.
	if(isset($_POST["address"])){
		// connect to the database
		require_once 'connect.php';	
		
		// clean data entered into form fields
		$address = mysqli_real_escape_string($link, $_POST['address']);
		$sitename = mysqli_real_escape_string($link, $_POST['sitename']);
		$date = mysqli_real_escape_string($link, $_POST['date']);
		$category = mysqli_real_escape_string($link, $_POST['category']);
		$person = mysqli_real_escape_string($link, $_POST['person']);
		$description = mysqli_real_escape_string($link, $_POST['description']);
		
		// define the SQL query  
		$thequery = "INSERT INTO url_list
	        SET address='$address', siteName='$sitename', dateAdded='$date', category='$category', person='$person', description='$description'";
        
		//run the query on database
		mysqli_query($link, $thequery);
		
		//close database connection
		mysqli_close($link);
		
		// return the user back to a logical page
		header('Location: list-links.php');
	}
?>
</body>
</html>