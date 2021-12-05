<!doctype html>

<html lang="en">

<head>

		<link rel="stylesheet" href="forum.css">
		
		<meta name="Iffat Sania Kabir" content="  iffat.kabir1@studytafensw.edu.au">
  
        <meta name="viewport" content="width=device-width, initial-scale=1">

<style>

#frmCheckUsername {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.demoInputBox{padding:7px; border:#F0F0F0 1px solid; border-radius:4px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}

	   .column{
		   float: left;
		   padding: 10px;
		   height: 400px;
		   margin-left: 60px;
		   margin-right: 150px;
	   }
	   
	   .left{
		   width: 50%;
	   }
	   
	   .right{
		   width: 50%;
	   }
	   
	   .row:after{
		   content: "";
		   display: table;
		   clear: both;
	   }
	   
   
</style>
<script src="jquery.js"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>

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

<div class="row">

   <div class="column">
   
        <h5>This is a Discussion Based Forum</h5><br>
		<p>Please check your user availability so that you can create post and add topics.</p><br>
        <div id="frmCheckUsername">
            <label><strong>Check Username:</strong></label>
            <input name="username" type="text" id="username" class="demoInputBox" onchange="checkAvailability()">
            <span id="user-availability-status"></span>    
        </div>
        <p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>
		
   </div>
   
   <div class="column">
   
        <div class="card">
		
		    <h4>eShopping- Online Shopping</h4><br>
			<img src="image/shopping-bag.jpg" alt="Shopping Bag" width="250" height="250">
			<div class="container">
			     <h5>eShopping</h5>
				 <p>Shopping is Fun</p>
			</div>

		</div>
   
   </div>


</div>

<footer>
		
    <a>&copy; Discussion Based Forum with eShopping; All rights reserved.</a>
		
</footer>

</body>