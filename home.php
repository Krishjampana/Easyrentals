<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Rental - Home</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
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
</head>
<body>
    <!-- Navigation Menu -->
    <div class="navbar">
        <ul>
            <li><a href="addItems.php">Add Item</a></li>
            <li><a href="my_items.php">My Items</a></li>
            <li><a href="rental_history.php">Rental History</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <h1>Available Items</h1>
        <div class="form">
        <?php
            require('db.php');
           
            $query = "SELECT * from `items` where status='available'";
            $result = mysqli_query($con, $query);
            echo "<table>
            <tr>
            <th>Image</th>
            <th>Name</th>
            <th>User</th>
            <th>Price</th>
            <th>Description</th>
             <th>Rent</th>
            </tr>";
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td><img src='items/{$row['imageName']}' alt='Item Image'></td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>Krishna</td>";
                echo "<td>$".$row['price']."</td>";
                echo "<td>".$row['description']."</td>";
                ?>
                 <td><a href="rent_item.php?item_id=<?php echo $row['item_id']; ?>">Rent</a></td>
        
                <?php
                echo "</tr>";
            }
            echo "</table>";
         ?>
        </div>
    </div>

</body>
</html>
