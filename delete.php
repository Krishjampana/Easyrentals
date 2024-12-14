<?php
    $item_id=$_GET['item_id'];
    include('db.php');
    $result = mysqli_query($con, "SELECT * from `items` where item_id='$item_id'");
    $row=mysqli_fetch_array($result);
    unlink("items/".$row['imageName']);
    mysqli_query($con,"delete from `items` where item_id='$item_id'");
    echo "<div class='form'>
    <h3>Deleted succesfully</h3><br/>
    <p class='link'>Click here to see products<a href='my_items.php'>Products</a></p>
    </div>";
?>