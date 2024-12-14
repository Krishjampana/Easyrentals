<?php
require('db.php'); // Connect to database

$item_id = $_GET['item_id'];

// Fetch item details for display
$item_query = "SELECT * FROM items WHERE item_id = '$item_id'";
$item_result = mysqli_query($con, $item_query);
$item = mysqli_fetch_assoc($item_result);

// Check if the item is already rented
$availability_query = "SELECT * FROM items WHERE item_id = '$item_id' AND status = 'available'";
$availability_result = mysqli_query($con, $availability_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Item</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f7f7f7; margin: 0; }
        .container { max-width: 500px; width: 100%; padding: 20px; background: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border-radius: 8px; text-align: center; }
        h1 { color: #333; }
        .item-details { margin-top: 20px; text-align: left; }
        .item-details p { margin: 8px 0; }
        .rent-button { margin-top: 20px; padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        .rent-button:disabled { background-color: #ccc; cursor: not-allowed; }
    </style>
</head>
<body>

<div class="container">
    <h1>Rent Item</h1>
    
    <?php if ($item): ?>
        <div class="item-details">
            <p><strong>Item:</strong> <?php echo $item['name']; ?></p>
            <p><strong>Description:</strong> <?php echo $item['description']; ?></p>
            <p><strong>Price per day:</strong> $<?php echo $item['price']; ?></p>
            <p><strong>Status:</strong> <?php echo $item['status']; ?></p>
        </div>

        <?php if (mysqli_num_rows($availability_result) > 0): ?>
            <!-- Rent Button Form -->
            <form action="rent_item.php" method="post">
                <input type="hidden" name="item_id" value="<?php echo $item_id; ?>">
                <button type="submit" class="rent-button">Rent this item</button>
            </form>
        <?php else: ?>
            <p style="color: red;">Sorry, this item is no longer available.</p>
        <?php endif; ?>
    <?php else: ?>
        <p>Item not found.</p>
    <?php endif; ?>

</div>

</body>
</html>
