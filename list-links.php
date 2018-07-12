<?php
	//include DB connection info
	require_once 'connect.php';
	
	//create SQL query and run on database
	$sql_query = "SELECT * 
				FROM url_list";
	$result = mysqli_query($link, $sql_query);
	
	// when data is returned, load one record at a time into an array
	while ($row = mysqli_fetch_array($result))
	{
		$websites[] = array('id' => $row['urlID'], 'site' => $row['siteName'], 'address' => $row['address'], 'date' => $row['dateAdded'], 'person' => $row['person'], 'description' => $row['description'], 'category' => $row['category']);
	}
	
	//close database connection
	mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
	<title>URL B@nk</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>URLb@nk - All Links</h1>
	<table id="results"> 
        <tr>
        	<th>URL ID</th>
            <th>Address</th>
            <th>Site Name</th>
            <th>Category</th>
            <th>Person Adding</th>
            <th>Date Added</th>
            <th>Description</th>
         </tr>
            <!--Loop through the returned answertable printing each record in a table row. Repeat until all data is displayed. -->
            <?php foreach ($websites as $website): ?>
            <form action="managelinks.php" method="post">
	            <tr>
	              <td><?php echo ($website['id']); ?></td>
	              <td><?php echo ($website['address']); ?></td>
	              <td><?php echo ($website['site']); ?></td>
	              <td><?php echo ($website['category']); ?></td>
	              <td><?php echo ($website['person']); ?></td>
	              <td><?php echo ($website['date']); ?></td>
	              <td><?php echo ($website['description']); ?></td>
	              <td><input type="hidden" name="id" value="<?php echo $website['id']; ?>"></td>
	              <td><input type="submit" name="action" value="Edit"></td>
	              <td><input type="submit" name="action" value="Delete"></td>
	            </tr>
            </form>
            <?php endforeach; ?>
        </table>
    <p>[<a href="index.html">Home</a>]</p>
	<footer>A PHP Learning Exercise | &copy M Ritter - 2018</footer>
</body>
</html>