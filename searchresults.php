<?php
// use connection info already in connect file
require_once 'connect.php';

// collect search term from search box
$searchterm = $_POST['keyword'];

$thequery = "SELECT *  
           FROM url_list
           WHERE siteName LIKE '%$searchterm%'
           OR person LIKE '%$searchterm%'
           OR description LIKE '%$searchterm%'
           OR category LIKE '%$searchterm%'";

// run the SQL query and store results in variable
$result = mysqli_query($link, $thequery);

// if no data returned, show error page
if (mysqli_num_rows($result) < 1) {
	echo "No records found.<br>";
	echo "<a href='index.html'>Back to Home Page</a>";
	exit;
}

// when data is returned, load one record at a time into an array
while ($row = mysqli_fetch_array($result))
{
	$urls[] = array('id' => $row['urlID'], 'sitename' => $row['siteName'], 'address' => $row['address'],
		'date' => $row['dateAdded'], 'category' => $row['category'], 'whoadded' => $row['person'], 
		'description' => $row['description']);
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
	<h1>URL B@nk - All Links</h1>
    <table id="results"> 
        <tr>
        	 <th>URL ID</th>
             <th>Site Name</th>
             <th>Site URL</th>
             <th>Date Added</th>
             <th>Site Category</th>
             <th>Who Added</th>
             <th>Description</th>
        </tr>
            <!--Loop through the returned answertable printing each record in a table row. Repeat until all data is displayed. -->
            <?php foreach ($urls as $url): ?>
            <form action="managelinks.php" method="post">
	            <tr>
	              <td><?php echo ($url['id']); ?></td>
	              <td><?php echo ($url['sitename']); ?></td>
	              <td><?php echo ($url['address']); ?></td>
	              <td><?php echo ($url['date']); ?></td>
	              <td><?php echo ($url['category']); ?></td>
	              <td><?php echo ($url['whoadded']); ?></td>
	              <td><?php echo ($url['description']); ?></td>
	              <td><input type="hidden" name="id" value="<?php echo $url['id']; ?>"></td>
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