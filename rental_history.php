<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Rental - Rental History</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>
    <!-- Navigation Menu -->
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
    
    <!-- Rental History Table Container -->
    <div class="table-container">
        <h1>My Rental History</h1>
        <div class="form">
            <?php
                require('db.php');
                include('authentication.php');

                // Ensure the session is started and username is available
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];

                    // Query to fetch rental history for the logged-in user
                    $query = "SELECT rentals.*, items.name, items.imageName 
                              FROM rentals 
                              JOIN items ON rentals.item_id = items.item_id
                              WHERE rentals.username = '$username'
                              ORDER BY rentals.rent_date DESC";

                    $result = mysqli_query($con, $query);

                    // Check if there are any rentals
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table>
                                <tr>
                                    <th>Image</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Rent Date</th>
                                    <th>Return</th>
                                </tr>";

                        // Loop through each rental record and display it
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td><img src='items/{$row['imageName']}' alt='Item Image'></td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>$".$row['price']."</td>";
                            echo "<td>".$row['rent_date']."</td>";
                            ?>
                          
                            <td><a href="return_item.php?item_id=<?php echo $row['item_id']; ?>">Return</a></td>
                            <?php
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "<p>No rental history found.</p>";
                    }
                } else {
                    echo "<p>Please log in to view your rental history.</p>";
                }
            ?>
        </div>
    </div>

</body>
</html>
