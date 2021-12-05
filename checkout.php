<?php


?>


<!DOCTYPE html>
<html>
<head>

    <title>Customer Checkout</title>
	
	<link rel="stylesheet" href="forum.css">
		
	<meta name="Iffat Sania Kabir" content="  iffat.kabir1@studytafensw.edu.au">
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
		<style>
	
	   .column{
		   float: left;
		   padding: 10px;
		   height: 400px;
	   }
	   
	   .left{
		   width: 35%;
	   }
	   
	   .right{
		   width: 65%;
	   }
	   
	   .row:after{
		   content: "";
		   display: table;
		   clear: both;
	   }
	   
	   form{
	
	      margin-left: 80px;
       }

	   
	   table{
	
           border-spacing: 0;
           color: #4a4a4d;
           font: 14px/1.4 Verdana, Helvetica, Arial, sans-serif;
           margin-top: 25px;
	       margin-left: 50px;
        }

        th{
	
           background-color: #1abc9c;
	       color: #F5FFFA;
	       height: 30px;
	       text-align: center;	
        }

        th:first-child {
           text-align: left;
           border-radius: 10px 0 0 0;
        }

       th:last-child{
	
	       border-radius: 0 10px 0 0;
       }

       td{

           border-bottom: 1px solid #cecfd5;
           border-right: 1px solid #cecfd5;
       }

       td:first-child{
	
           border-left: 1px solid #cecfd5; 
       }

       strong{
	
          color: #395870;
          display: block; 
       }

       em{
	      color:#f00;
       }
       
	   .num_posts_col{ 

           text-align: center;   
       }
	
	</style>

</head>
<body>

    <header>
		
		<h1>Discussion Based Forum</h1>
	    <p>with eShopping</p>
		
	</header>
		
	<nav class="navbar">
		
		<a href="index.html">HOME</a>
	    <a href="forum.html">My Forum</a>
		<a href="seestore.php">eShopping</a>
		
	</nav>
	
	<main>
	
	    <br><a href="seestore.php">Continue Shopping</a><br><br>
		
		<h2>Customer Billing Information</h2><br>
	            <form action="thankyou.php" method="post">
		   
		          <fieldset>
			   
			        <legend>Checkout Form</legend>
					<br>
					<label for="name">Name</label>
					<input type="text" name="name" id="name" required><br>

					<label for="address">Address</label>
					<input type="text" name="address" id="address" required><br>

					<label for="city">City</label>
					<input type="text" name="city" id="city" required> <br>

					<label for="state">State</label>
					<input type="text" name="state" id="state" required><br>

					<label for="postcode">Postcode</label>
					<input type="text" name="postcode" id="postcode" required><br>

					<label for="tel">Telephone</label>
					<input type="text" name="tel" id="tel" required><br>

					<label for="email">Email</label>
					<input type="text" name="email" id="email" required> <br>

					<label for="cardName">Name on card</label>
					<input type="text" name="cardName" id="cardName" required><br>
					<label for="expiry">Expiry date of card:</label>
				    <?php

					$years=array();
					echo"<select name='month' id='sel'>";
					for ($i=1;$i<=12;$i++){
						echo"<option value='$i'>$i</option>";
					}
					echo"</select>";
					$years=array();
					echo "<select name='year'>";
					for ($i=2021; $i <=2030; $i++){
						echo "<option value='$i'>$i</option>";
					}
					echo "</select><br>";
					echo "</select><br>";
					?>
					<br>
					<input type="hidden" name="session" value="$_COOKIE['PHPSESSID']">
					<button class="button-form" type="submit" name="submit">Confirm Checkout</button><br><br>
			   	   			   
			      </fieldset>
		   
		        </form>
	
	</main>


</body>
</html>