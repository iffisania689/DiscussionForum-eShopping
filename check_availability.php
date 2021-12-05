<?php

  $conn = mysqli_connect("localhost","root","","discussion-forum");
  
  if(!empty($_POST["username"])){
	  $result = mysqli_query($conn,"SELECT count(*) FROM users WHERE userName='" . $_POST['username'] . "'");
  
	  $row = mysqli_fetch_row($result);
      $user_count = $row[0]; 
	  if($user_count>0){
		  
         echo "<span class='status-not-available'> Username Not Available.</span>";
      
	  }else{
		  
          echo "<span class='status-available'> Username Available.</span>";
      
	  }

  }

?>