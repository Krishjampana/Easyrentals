<?php
require('db.php');
include('authentication.php');

// Start the session if it's not started

$username = $_SESSION['username'];
$item_id = $_GET['item_id'];
$currentDate = date('Y-m-d');

// Query to get the item details
$query = mysqli_query($con, "SELECT * FROM `items` WHERE item_id='$item_id'");
$row = mysqli_fetch_array($query);

// Check if item exists before proceeding
if ($row) {
    // Insert rental record
    $price = $row['price'];  // Fetching the price from the result
    $queryInsert = "INSERT INTO `rentals` (item_id, username, price, rent_date) VALUES ('$item_id', '$username', '$price', '$currentDate')";
    
    // Execute the query
    $result = mysqli_query($con, $queryInsert);
    $updateStatusQuery = "UPDATE items SET status = 'rented' WHERE item_id = '$item_id'";
$result1 = mysqli_query($con, $updateStatusQuery);
    
   
    if ($result) {
        echo "<div class='form'>
                <h3>Rented successfully</h3><br/>
                <p class='link'><a href='home.php'>Home</a></p>
              </div>";
    } else {
        echo "<div class='form'>
                <h3>Booking not completed</h3><br/>
                <p class='link'><a href='home.php'>Home</a></p>
              </div>";
    }
} else {
    echo "<div class='form'>
            <h3>Item not found</h3><br/>
            <p class='link'><a href='home.php'>Home</a></p>
          </div>";
}
?>
