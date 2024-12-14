<?php
// Start the session to access the logged-in user
session_start();

// Include database connection and authentication
include('db.php');
include('authentication.php');

// Check if the form was submitted
if (isset($_POST['update'])) {
    // Get the updated email and mobile number from the form
    $username = $_SESSION['username']; // Get the logged-in username
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phnum = mysqli_real_escape_string($con, $_POST['phnum']);

    // Check if the fields are empty
    if (empty($email) || empty($phnum)) {
        echo "<script>alert('Both fields are required');</script>";
        exit();
    }

    // Prepare the SQL query to update the user's information
    $query = "UPDATE `users` SET email='$email', phnum='$phnum' WHERE username='$username'";

    // Execute the query
    if (mysqli_query($con, $query)) {
        // Success - Redirect back to the profile page or show success message
        echo "<script>alert('Profile updated successfully!'); window.location.href='home.php';</script>";
    } else {
        // Error handling
        echo "<script>alert('Error updating profile. Please try again.');</script>";
    }
} else {
    // If the form is not submitted, redirect to the home page
    header("Location: home.php");
    exit();
}
?>
