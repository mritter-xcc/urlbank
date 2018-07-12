<?php
/* Code to delete record */
// if the Delete button has been clicked on the manage data page...
if (isset($_POST['action']) and $_POST['action'] == 'Delete')
{
	require_once 'connect.php';
	//get ID of record to delete
	$id = mysqli_real_escape_string($link, $_POST['id']);
	// Delete selected record
	$thequery = "DELETE FROM url_list
				WHERE urlID='$id'";
	
	//run query on database
	mysqli_query($link, $thequery);
	
	//close database connection
	mysqli_close($link);
	
	// return the user back to a logical page
	header('Location: list-links.php');
	exit();
}

/* Edit Record */
// if the Edit button has been clicked on the manage toys page...
if (isset($_POST['action']) and $_POST['action'] == 'Edit')
{
	// connect to the database
	require_once 'connect.php';
	// detect the id of the selected record
	$id = mysqli_real_escape_string($link, $_POST['id']);
	
	// run the query on the selected record it
	$thequery = "SELECT urlID, address, category, dateAdded, description, person, siteName
			FROM url_list 
			WHERE urlID='$id'";
	
	// run the query and load record into an array
	$result = mysqli_query($link, $thequery);
	
	// load fields from result array into a variable
	$row = mysqli_fetch_array($result);
	
	// split result array into individual variables
	$id = $row['urlID'];
	$address = $row['address'];
	$category = $row['category'];
	$date = $row['dateAdded'];
	$description = $row['description'];
	$person = $row['person'];
	$siteName = $row['siteName'];
	
	//close database connection
	mysqli_close($link);
	
	//send data to edit page
	include 'editlink.html';
	exit();
}

/* UPDATE edited form*/
// if the Update button has been clicked on the edit form
if (isset($_GET['editform']))
{
	// connect to the database
	require_once 'connect.php';
	
	// load the form data into variables
	$url = mysqli_real_escape_string($link, $_POST['url']);
	$sitename = mysqli_real_escape_string($link, $_POST['sitename']);
	$category = mysqli_real_escape_string($link, $_POST['category']);
	$person= mysqli_real_escape_string($link, $_POST['whoadded']);
	$date= mysqli_real_escape_string($link, $_POST['dateadded']);
	$description= mysqli_real_escape_string($link, $_POST['description']);
	$uid= mysqli_real_escape_string($link, $_POST['id']);
	
	// create a query to update the table
	$thequery = "UPDATE url_list
				SET address='$url', category='$category', person='$person', description='$description', siteName='$sitename', dateAdded='$date'
				WHERE urlID='$uid'";
	
	// run the query on the database
	mysqli_query($link, $thequery);

	//close database connection
	mysqli_close($link);
	
	// return the user back to a logical page
	header('Location: list-links.php');
	exit();
}
?>
