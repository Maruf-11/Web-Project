<?php
include('db.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkin_date = $_POST['checkin_date'];
    $checkout_date = $_POST['checkout_date'];
    $room_type = $_POST['room_type'];

    $sql = "INSERT INTO bookings (name, email, phone, checkin_date, checkout_date, room_type) VALUES ('$name', '$email', '$phone', '$checkin_date', '$checkout_date', '$room_type')";

    if(mysqli_query($conn, $sql)){
        header("Location: index.php");
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Booking</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Add Booking</h1>
    <form action="add_booking.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required><br>
        <label for="checkin_date">Check-in Date:</label>
        <input type="date" name="checkin_date" id="checkin_date" required><br>
        <label for="checkout_date">Check-out Date:</label>
        <input type="date" name="checkout_date" id="checkout_date" required><br>
        <label for="room_type">Room Type:</label>
        <input type="text" name="room_type" id="room_type" required><br>
        <input type="submit" value="Add Booking">
    </form>
    <script src="../js/script.js"></script>
</body>
</html>
