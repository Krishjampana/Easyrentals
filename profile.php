<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Rental - Profile</title>
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

<?php
    include('db.php');
    include('authentication.php');
    $username = $_SESSION['username'];

    // Fetch user details from the database
    $query = mysqli_query($con, "SELECT * FROM `users` WHERE username='$username'");
    $row = mysqli_fetch_array($query);
?>

<!-- Profile Update Form with Inputs in Table -->
<div class="table-container">
    <h1 style="text-align:center; color:#FF6347;">Edit Profile</h1>
    <form class="form" method="POST" action="update_profile.php?username=<?php echo $username; ?>">
        <table>
            <tr>
                <th>Email</th>
                <td><input type="email" class="login-input" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required></td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td><input type="tel" class="login-input" name="phnum" value="<?php echo htmlspecialchars($row['phnum']); ?>" required></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" class="login-button" name="update" value="Update Profile">
                </td>
            </tr>
        </table>
    </form>

    <p class="link" style="text-align:center;"><a href="home.php">Back to Home</a></p>
</div>

</body>
</html>
