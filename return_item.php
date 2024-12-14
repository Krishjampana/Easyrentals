<?php
require('db.php');
include('authentication.php');
$item_id = $_POST['item_id'];
$username = $_SESSION['username'];
$updateItemQuery = "UPDATE items SET status = 'available' WHERE item_id = '$item_id'";
$result = mysqli_query($con, $updateItemQuery);
    
if ($result) {
    echo "<div class='form'>
            <h3>Returned successfully</h3><br/>
            <p class='link'><a href='home.php'>Home</a></p>
          </div>";
} else {
    echo "<div class='form'>
            <h3>Not yet returned</h3><br/>
            <p class='link'><a href='home.php'>Home</a></p>
          </div>";
}
?>
