<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Edit</title>
    <h1 style="font-size:50px;text-align:center;color:#000000;background-color:white">Easy Rentals</h1>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
	include('db.php');
	$item_id=$_GET['item_id'];
	$query=mysqli_query($con,"select * from `items` where item_id='$item_id'");
	$row=mysqli_fetch_array($query);
?>
<form class="form" method="POST" name="edit" action="update_item.php?item_id=<?php echo $item_id; ?>">
    <h1 class="login-title">Edit</h1>
		<label>Price</label><input type="text" class="login-input" value="<?php echo $row['price']; ?>" name="price">
		<label>Description</label><input type="text" class="login-input" value="<?php echo $row['description']; ?>" name="description">
		<input type="submit" class="login-button" name="update">
		<p class="link"><a href="home.php">Home</a><p>
	</form>
</body>
</html>