<?php
include('db.php');

if(!isset($_SESSION['user_id'])){
    header("Location: authentication/login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM bookings WHERE user_id=$user_id");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <h1>Hotel Management System</h1>
    <a href="auth/logout.php">Logout</a>
    <a href="add_booking.php">Add Booking</a>
    <table>
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
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['checkin_date']; ?></td>
            <td><?php echo $row['checkout_date']; ?></td>
            <td><?php echo $row['room_type']; ?></td>
            <td>
                <a href="view_booking.php?id=<?php echo $row['id']; ?>">View</a>
                <a href="edit_booking.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a href="delete_booking.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this booking?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
