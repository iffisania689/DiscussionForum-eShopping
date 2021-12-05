<?php
session_start();
$subtotal=0;
//connect to database
$mysqli=mysqli_connect("localhost", "root", "", "discussion-forum");
$display_block = "<h1> Thank you for shopping with eShopping</h1>";


if (isset($_POST['submit'])) {
//get all the form data and clean it

    $safe_sess=mysqli_real_escape_string($mysqli, $_POST['session']);
    $safe_name=mysqli_real_escape_string($mysqli, $_POST['name']);
    $safe_address=mysqli_real_escape_string($mysqli, $_POST['address']);
    $safe_city=mysqli_real_escape_string($mysqli, $_POST['city']);
    $safe_state=mysqli_real_escape_string($mysqli, $_POST['state']);
    $safe_post=mysqli_real_escape_string($mysqli, $_POST['postcode']);
    $safe_tel=mysqli_real_escape_string($mysqli, $_POST['tel']);
    $safe_email=mysqli_real_escape_string($mysqli, $_POST['email']);
    $safe_cName=mysqli_real_escape_string($mysqli, $_POST['cardName']);
    $safe_month=mysqli_real_escape_string($mysqli, $_POST['month']);
    $safe_year=mysqli_real_escape_string($mysqli, $_POST['year']);
}

$safe_id=mysqli_insert_id($mysqli);
//var_dump($safe_id);

$display_block .="<p> Print a copy of this for your records</p>
<p>Name on your card: ".$safe_cName."</p> <br>
<p>Please <a href= \"seestore.php\">continue to shop</a></p>";

//check for cart items based on user session id
$get_cart_sql = "SELECT st.id, si.item_title, si.item_price, st.sel_item_qty, st.sel_item_size, si.id, si.item_stock,
st.sel_item_color FROM store_shoppertrack AS st LEFT JOIN store_items AS si ON si.id = 
st.sel_item_id WHERE session_id = '".$_COOKIE['PHPSESSID']."'";

$get_cart_res= mysqli_query($mysqli,$get_cart_sql) or die(mysqli_error($mysqli));
while($cart_info =mysqli_fetch_array($get_cart_res)) {
    $id=$cart_info['id'];
    $item_title=$cart_info['item_title'];
    $item_price=$cart_info['item_price'];
    $item_qty=$cart_info['sel_item_qty'];
    $item_color=$cart_info['sel_item_color'];
    $item_size=$cart_info['sel_item_size'];
    $total_price=sprintf("%.02f",$item_price * $item_qty);
	
	$subtotal = sprintf("%.02f", $subtotal + $total_price); 
	
	
	$newQty = $cart_info['item_stock'] - $cart_info['sel_item_qty'];
	if($cart_info['item_stock']>= $cart_info['sel_item_qty'])
      {
           $update_quant="UPDATE store_items SET item_stock = '".$newQty."' where '".$id."'= store_items.id AND item_stock > '".$newQty."'";
               $get_update_res = mysqli_query($mysqli,$update_quant)
          or die(mysqli_error($mysqli));
      } 

    //trying to insert into store_order_items
$addtoOrderItems_sql = "INSERT INTO store_orders_items(order_id, sel_item_id,
sel_item_qty, sel_item_color, sel_item_size, sel_item_price) 
VALUES ('".$safe_id."', '".$id."', '".$item_qty."', '".$item_color."','".$item_size."','".$item_price."')";

$addtocart_res=mysqli_query($mysqli,$addtoOrderItems_sql)or die(mysqli_error($mysqli)); 
}



$addtoOrder_sql = "INSERT INTO store_orders (order_date, order_name, order_address, order_city,order_state, order_postcode,
 order_tel, order_email, item_total, cc_cardName,cc_month, cc_year)
VALUES (now(),'".$safe_name."','".$safe_address."', '".$safe_city."','".$safe_state."', '".$safe_post."','".$safe_tel."',
 '".$safe_email."', '".$subtotal."', '".$safe_cName."','".$safe_month."', '".$safe_year."')";

$addtocart_res = mysqli_query($mysqli,$addtoOrder_sql)
or die(mysqli_error($mysqli));



$delOrderItems_sql="delete from store_shoppertrack";
$del_res=mysqli_query($mysqli,$delOrderItems_sql) or die(mysqli_error($mysqli));

if(mysqli_num_rows($get_cart_res) < 1) {
//print message
$display_block .="<p>You have no items in your cart.
Please <a href= \"seestore.php\">continue to shop</a></p>";
}
//close connection to MySQL
mysqli_close($mysqli);
?>

<!DOCTYPE html>
<html>
<head>
<title>Thank you</title>
<style type="text/css">
table {
border: 1px solid black;
border-collapse: collapse;
}
th {
border: 1px solid black;
padding: 6px;
font-weight: bold;
background: #ccc;
}
td {
border: 1px solid black;
padding: 6px;
}
.num_posts_col { text-align: center; }
</style>
</head>
<body>
<h3>Thank you for shopping with you. Your order has been confirmed. We will send an email to you when we ship your order.</h3>

<p>Would you like to <a href="seestore.php">continue to do shopping</a>?</p>
<p>or you can close this window</p>
</body>
</html>
