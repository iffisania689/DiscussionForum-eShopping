<?php
include 'ch21_include.php';
doDB();

//check for required info from the query string
if (!isset($_GET['topic_id'])) {
header("Location: topiclist.php");
exit;
}

//create safe values for use
$safe_topic_id = mysqli_real_escape_string($mysqli, $_GET['topic_id']);

//verify the topic exists
$verify_topic_sql = "SELECT topic_title FROM forum_topics
WHERE topic_id = '".$safe_topic_id."'";
$verify_topic_res = mysqli_query($mysqli, $verify_topic_sql)
or die(mysqli_error($mysqli));

if (mysqli_num_rows($verify_topic_res) < 1) {
//this topic does not exist
$display_block = "<p><em>You have selected an invalid topic.<br/>
Please <a href=\"topiclist.php\">try again</a>.</em></p>";
} else {
//get the topic title
while ($topic_info = mysqli_fetch_array($verify_topic_res)) {
$topic_title = stripslashes($topic_info['topic_title']);
}

//gather the posts
$get_posts_sql = "SELECT post_id, post_text,
DATE_FORMAT(post_create_time,
'%b %e %Y<br/>%r') AS fmt_post_create_time, post_owner
FROM forum_posts
WHERE topic_id = '".$safe_topic_id."'
ORDER BY post_create_time ASC";
$get_posts_res = mysqli_query($mysqli, $get_posts_sql)
or die(mysqli_error($mysqli));

//create the display string
$display_block = <<<END_OF_TEXT
<p>Post under the topic of <strong>$topic_title</strong>:</p><br>
<table>
<tr>
<th>AUTHOR</th>
<th>POST</th>
</tr>
END_OF_TEXT;

while ($posts_info = mysqli_fetch_array($get_posts_res)) {
$post_id = $posts_info['post_id'];
$post_text = nl2br(stripslashes($posts_info['post_text']));
$post_create_time = $posts_info['fmt_post_create_time'];
$post_owner = stripslashes($posts_info['post_owner']);

//add to display
$display_block .= <<<END_OF_TEXT
<tr>
<td>$post_owner<br/><br/>
created on:<br/>$post_create_time</td>
<td>$post_text<br/><br/>
<a href="replytopost.php?post_id=$post_id">
<strong>REPLY TO POST</strong></a></td>
</tr>
END_OF_TEXT;
}

//free results
mysqli_free_result($get_posts_res);
mysqli_free_result($verify_topic_res);

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
		
         <h4>  You can add your <a href="addtopic.html"> Topic </a> here, or to show all <a href="topiclist.php">
             <strong>Forum Topics</strong></a> </h4> <br><br>	
         <?php echo $display_block; ?>

    </main>
	
	<footer>
		
         <a>&copy; Discussion Based Forum with eShopping; All rights reserved.</a>
	
     </footer>

		
			
</body>
</html>