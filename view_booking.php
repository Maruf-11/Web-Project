<?php
require_once('config.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: auth/login.php");
    exit;
}

// Debugging: Check database connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Fetch all bookings from the database
$sql = "SELECT * FROM bookings";
$result = mysqli_query($conn, $sql);

// Debugging: Check if the query was successful
if (!$result) {
    die("ERROR: Could not execute $sql. " . mysqli_error($conn));
}

// Debugging: Check if there are rows returned
$num_rows = mysqli_num_rows($result);
if ($num_rows > 0) {
    echo "Number of bookings found: $num_rows";
} else {
    echo "No bookings found in the database.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Bookings</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Bookings</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Check-in Date</th>
                <th>Check-out Date</th>
                <th>Room Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($num_rows > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['checkin_date']; ?></td>
                        <td><?php echo $row['checkout_date']; ?></td>
                        <td><?php echo $row['room_type']; ?></td>
                        <td>
                            <a href="edit_booking.php?id=<?php echo $row['id']; ?>">Edit</a>
                            <a href="delete_booking.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8">No bookings found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
