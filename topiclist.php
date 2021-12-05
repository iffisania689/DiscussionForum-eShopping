<?php
include 'ch21_include.php';
doDB();

//gather the topics
$get_topics_sql = "SELECT topic_id, topic_title,
DATE_FORMAT(topic_create_time, '%b %e %Y at %r') AS
fmt_topic_create_time, topic_owner FROM forum_topics
ORDER BY topic_create_time DESC";
$get_topics_res = mysqli_query($mysqli, $get_topics_sql)
or die(mysqli_error($mysqli));

if (mysqli_num_rows($get_topics_res) < 1) {
//there are no topics, so say so
$display_block = "<p><em>No topics exist.</em></p>";
} else {
//create the display string
$display_block =<<<END_OF_TEXT
<table>
<tr>
<th>TOPIC TITLE</th>
<th># of POSTS</th>
</tr>
END_OF_TEXT;

while ($topic_info = mysqli_fetch_array($get_topics_res)) {
$topic_id = $topic_info['topic_id'];
$topic_title = stripslashes($topic_info['topic_title']);
$topic_create_time = $topic_info['fmt_topic_create_time'];
$topic_owner = stripslashes($topic_info['topic_owner']);

//get number of posts
$get_num_posts_sql = "SELECT COUNT(post_id) AS post_count FROM
forum_posts WHERE topic_id = '".$topic_id."'";
$get_num_posts_res = mysqli_query($mysqli, $get_num_posts_sql)
or die(mysqli_error($mysqli));

while ($posts_info = mysqli_fetch_array($get_num_posts_res)) {
$num_posts = $posts_info['post_count'];
}

//add to display
 $display_block .= <<<END_OF_TEXT
 <tr>
<td><a href="showtopic.php?topic_id=$topic_id">
<strong>$topic_title</strong></a><br/>
Created on $topic_create_time by $topic_owner</td>
<td class="num_posts_col">$num_posts</td>
</tr>
END_OF_TEXT;
}
//free results
mysqli_free_result($get_topics_res);
mysqli_free_result($get_num_posts_res);

//close connection to MySQL
mysqli_close($mysqli);

//close up the table
$display_block .= "</table>";
}
?>


<!doctype html>
<html lang="en">
<head>

	<title>Topics in My Forum</title>
	
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
	
	<main>
	
	    <h1> All Topics in This Forum</h1>
        <?php echo $display_block; ?>
	
	</main>
	
	<footer>
		
         <a>&copy; Discussion Based Forum with eShopping; All rights reserved.</a>
	
    </footer>
			
</body>
</html>