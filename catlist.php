<?php
include 'ch21_include.php';
doDB();

//check for required info from the query string
if (!isset($_POST['category'])){
	header("Location:showforum.php");
}

$safe_forum_id = $_POST['category'];
?>


<!doctype html>

<html lang="en">
<head>				

	
	<title>My Discussion Forum</title>
		
    <link rel="stylesheet" href="forum.css">
		
    <meta name="Iffat Sania Kabir" content="  iffat.kabir1@studytafensw.edu.au">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">				
				
</head>

<body>
		
<header>
		
   <h1>Discussion Based Forum</h1>
   <p>with eShopping</p>

</header>
		
<nav class="navbar">
		
	<a href="index.php">HOME</a>
	<a href="forum.html">My Forum</a>
	<a href="seestore.php">eShopping</a>
			
</nav>

			
<?php
// choose a forum with the following join adapted from topiclist
$get_cat_sql = "SELECT ft.topic_id, ft.topic_owner, ft.topic_title,ft.forum_id,
DATE_FORMAT(topic_create_time, '%b %e %Y<br>%r') AS fmt_topic_create_time
FROM forum_topics AS ft LEFT JOIN forums AS fc ON fc.forum_id = ft.forum_id
WHERE ft.forum_id = '".$safe_forum_id."'";

$get_cat_res = mysqli_query($mysqli, $get_cat_sql)
or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_cat_res) < 1) {
//there are no topics, so say so
$display_block = "<p><em>No topics exist. Please go back to choose a forum category.</em></p>";
} else {
//create the display string
$display_block =<<<END_OF_TEXT
<table>
<tr>
<th>TOPIC TITLE</th>
<th>Topic Under Your Category</th>
</tr>
END_OF_TEXT;

while($topic_info = mysqli_fetch_array($get_cat_res)){
$topic_id = $topic_info['topic_id'];
$topic_title = $topic_info['topic_title'];
$topic_create_time = $topic_info['fmt_topic_create_time'];
$topic_owner = $topic_info['topic_owner'];

//add to display
$display_block .= <<<END_OF_TEXT
<tr>
<td>$topic_owner<br/><br/>
created on:<br/>$topic_create_time</td>
<td>$topic_title<br/><br/>
<p>To show the above topic's <a href="showtopic.php?topic_id=$topic_id"><strong>Post</strong></a></p></td><br/>
</td>
</tr>
END_OF_TEXT;
}

//free results
mysqli_free_result($get_cat_res);
//mysqli_free_result($verify_topic_res);

//close connection to MySQL
mysqli_close($mysqli);

//close up the table
$display_block .= "</table>";
}

?>

<?php echo $display_block; ?>
			
<h3> Go Back to <a href="showforum.php">category</a></h3>						
			
<footer>
		
    <a>&copy; Discussion Based Forum with eShopping; All rights reserved.</a>
	
</footer>		

</body>
</html>