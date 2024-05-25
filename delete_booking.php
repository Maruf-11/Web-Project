<?php
require_once('config.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

// Check if the booking ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    echo "Attempting to delete booking with ID: $id<br>"; // Debugging line

    // Delete the booking from the database
    $sql = "DELETE FROM bookings WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the view bookings page after successful deletion
        header("Location: view_booking.php");
        exit;
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
    }
} else {
    echo "Invalid booking ID.";
}
?>
