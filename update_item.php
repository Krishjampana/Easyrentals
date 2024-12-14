<?php
	include('db.php');
	$item_id=$_GET['item_id'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	mysqli_query($con,"update `items` set price='$price', description='$description' where item_id='$item_id'");
	echo "<div class='form'>
    <h3>Updated succesfully</h3><br/>
    <p class='link'>Click here to see items<a href='Home.php'>Home</a></p>
    </div>";
?>