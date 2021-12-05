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


<form method="post" action="catlist.php">

<legend>Please choose a forum category to show topics under each category and then click Show Topic Posts button.</legend><br><br>

<p><label for="forum"> Please choose a forum category to show topics under each category and then click Show Topic Posts button.</label><br><br></p>
<?php
include 'ch21_include.php';
doDB();
//same select as addtotopic page, but submit to catlist
$sql="SELECT forum_id, name, description FROM forums ORDER BY name";
$result = mysqli_query($mysqli,$sql);
echo"<select name=category>
<option value=''>Choose a category</option>";
while($forum=mysqli_fetch_array($result)){
	echo "<option value=$forum[forum_id]>$forum[name]</option>";
}
echo "</select>";
mysqli_close($mysqli);
?>

<br><br>

 <button class="btn default" type="submit" name="submit" value="submit">Show Topic Posts </button>

</form>
<br><br><br><br>
<br><br><br><br>
			
</main>

<footer>
		
    <a>&copy; Discussion Based Forum with eShopping; All rights reserved.</a>
	
</footer>
		
</body>
</html>