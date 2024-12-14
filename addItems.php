<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Add Products</title>
    <link rel="stylesheet" href="style.css"/>
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Navigation Menu Styling */
        .navbar {
            background-color: #333;
            padding: 10px 0;
        }

        .navbar ul {
            list-style: none;
            text-align: center;
        }

        .navbar ul li {
            display: inline-block;
            margin: 0 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 18px;
            padding: 10px 20px;
        }

        .navbar ul li a:hover {
            background-color: #555;
            border-radius: 5px;
        }

        /* Table Styling */
        .table-container {
            margin: 20px auto;
            width: 90%;
            max-width: 1200px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
            text-transform: uppercase;
        }

        td {
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background-color: #f9f9f9;
        }

        td img {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 150px;
        }

        .form {
            padding: 20px;
        }

        /* Responsive Image */
        @media screen and (max-width: 768px) {
            td img {
                width: 100px;
            }
        }
    </style>
    <header>
    <div class="navbar">
        <ul>
        <li><a href="home.php">Home</a></li>
            <li><a href="addItems.php">Add Item</a></li>
            <li><a href="my_items.php">My Items</a></li>
            <li><a href="rental_history.php">Rental History</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</header>
</head>
<body>
<?php
require('db.php');
    if(isset($_POST['submit'])){
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($con, $name);
        $price = stripslashes($_REQUEST['price']);
        $price = mysqli_real_escape_string($con, $price);
        $description = stripslashes($_REQUEST['description']);
        $description = mysqli_real_escape_string($con, $description);
        $imageName = $_FILES['itemImg']['name'];
        $destination = 'items/'. $imageName;
        move_uploaded_file($_FILES['itemImg']['tmp_name'], $destination);

        $query    = "INSERT into `items` (name, price, description, imageName, status)
                     VALUES ('$name','$price', '$description', '$imageName', 'available')";
        $result   = mysqli_query($con, $query);
        if ($result){
            echo "<div class='form'>
            <h3>You haved added Item successfully</h3><br/>
            <p class='link'>Click here to <a href='home.php'>Home</a> again.</p>
            </div>";
            
        } else {
            echo "<div class='form'>
            <h3>Field Missing</h3><br/>
            <p class='link'>Click here to <a href='addItems.php'>Add Items</a> again.</p>
            </div>";

        }
    }
    else{
?>
<h1 style="font-size:45px;text-align:center;color:#FF0000">Easy Rentals </h1>
    <form class="form" action="" method="post" name="additem" enctype="multipart/form-data">
        <h3 class="login-title">Add Items</h3>
        <input type="file" class="login-input" name="itemImg" placeholder="Item Image"/>
        <input type="text" class="login-input" name="name" placeholder="Item Name" required/>
        <textarea class="login-input" name="description" placeholder="Description" rows="10" cols="50" required></textarea>
        <input type="text" class="login-input" name="price" placeholder="Price per day" required>
        <input type="submit" value="Add Item" name="submit" class="login-button"/>
  </form>
<?php
}
?>
</body>
</html>