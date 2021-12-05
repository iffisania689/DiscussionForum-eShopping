<?php

    session_start();
	
	//connect to database
    $mysqli = mysqli_connect("localhost", "root", "", "discussion-forum");
	 
	$display_block = "<h1>Your Shopping Cart</h1>";

    //check for cart items based on user session id
    $get_cart_sql = "SELECT st.id, si.item_title, si.item_price, st.sel_item_qty, st.sel_item_size, 
      st.sel_item_color FROM store_shoppertrack AS st LEFT JOIN store_items AS si ON si.id = 
      st.sel_item_id WHERE session_id = '".$_COOKIE['PHPSESSID']."'";
    $get_cart_res = mysqli_query($mysqli, $get_cart_sql)
     or die(mysqli_error($mysqli));

    if (mysqli_num_rows($get_cart_res) < 1) 
	{
       //print message
       $display_block .= "<p>You have no items in your cart. Please <a href=\"seestore.php\">continue to 
       shop</a>!</p>";
    } 
	else 
	{
       //get info and build cart display
       $display_block .= <<<END_OF_TEXT
       <table>
         <tr>
            <th>Title</th>
            <th>Size</th>
            <th>Color</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total Price</th>
            <th>Action</th>
        </tr> 
END_OF_TEXT;


    while ($cart_info = mysqli_fetch_array($get_cart_res)) 
	{
       $id = $cart_info['id'];
       $item_title = stripslashes($cart_info['item_title']);
       $item_price = $cart_info['item_price'];
       $item_qty = $cart_info['sel_item_qty'];
       $item_color = $cart_info['sel_item_color'];
       $item_size = $cart_info['sel_item_size'];
       $total_price = sprintf("%.02f", $item_price * $item_qty);

      $display_block .= <<<END_OF_TEXT
      <tr>
         <td>$item_title <br></td>
         <td>$item_size <br></td>
         <td>$item_color <br></td>
         <td>\$ $item_price <br></td>
         <td>$item_qty <br></td>
         <td>\$ $total_price</td>
         <td><a href="removefromcart.php?id=$id">remove</a></td>
      </tr> 
END_OF_TEXT;
    
	}
	
	$display_block .= "</table>";
	}
	
	//free result
	mysqli_free_result($get_cart_res);
	
	//close connection to mysql_affected_rows
	mysqli_close($mysqli);

?>


<!DOCTYPE html>
<html>
<head>
    <title>My Store</title>
	
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
	
	   <br><a href="seestore.php">Continue Shopping</a><br><br>
	   	   
	   <div class="row">
	   
	       <div class="column left">  
		       <?php echo $display_block; ?>
		   </div>
		   
		    <div class="column right">
		   
		        <button class="btn default" type="submit"><a href="checkout.php">Proceed to Checkout</a></button>
		   
		    </div>
	   
	   </div>
	   
	   <br>	 
	</main>
	 
</body>
</html>
