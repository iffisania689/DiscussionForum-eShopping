<?php
include 'ch21_include.php';
doDB();

//check for required fields from the form
if ((!$_POST['forum_id']) ||(!$_POST['topic_owner']) || (!$_POST['topic_title']) || (!$_POST['post_text'])) {
header("Location: addtopic.html");
exit;
}

 //create safe values for input into the database
$clean_forum_id = mysqli_real_escape_string($mysqli,$_POST['forum_id']);
$clean_topic_owner = mysqli_real_escape_string($mysqli,$_POST['topic_owner']);
$clean_topic_title = mysqli_real_escape_string($mysqli,$_POST['topic_title']);
$clean_post_text = mysqli_real_escape_string($mysqli,$_POST['post_text']);

//create and issue the first query
$add_topic_sql = "INSERT INTO forum_topics (topic_title, topic_create_time, topic_owner,forum_id)
VALUES ('".$clean_topic_title ."', now(),'".$clean_topic_owner."','".$clean_forum_id."')";

$add_topic_res = mysqli_query($mysqli, $add_topic_sql)
or die(mysqli_error($mysqli));

//get the id of the last query
$topic_id = mysqli_insert_id($mysqli);

//create and issue the second query
$add_post_sql = "INSERT INTO forum_posts (topic_id, post_text, post_create_time, post_owner, forum_id)
VALUES ('".$topic_id."', '".$clean_post_text."', now(), '".$clean_topic_owner."', '".$clean_forum_id."')";

$add_post_res = mysqli_query($mysqli, $add_post_sql)
or die(mysqli_error($mysqli));
//close connection to MySQL
mysqli_close($mysqli);

//create nice message for user
$display_block = "<p>The <strong>".$_POST["topic_title"]."</strong> topic has been created.</p><br>";

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
		
	<main>
			
        <h1>New Topic Added</h1>
        <?php echo $display_block; ?>
        <p>
           <a href="topiclist.php">Please display topics and posts </a><br>
           <br>
           <a href="addtopic.html">Go back to add more topics</a> 
        </p>
		<br>
		
	</main>
	
	<footer>
		
         <a>&copy; Discussion Based Forum with eShopping; All rights reserved.</a>
		
    </footer>

			
</body>
</html>