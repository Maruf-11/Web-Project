<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Edit Booking</h1>
    <form action="edit_booking.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required><br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required><br>
        <label for="checkin_date">Check-in Date:</label>
        <input type="date" name="checkin_date" id="checkin_date" value="<?php echo $row['checkin_date']; ?>" required><br>
        <label for="checkout_date">Check-out Date:</label>
        <input type="date" name="checkout_date" id="checkout_date" value="<?php echo $row['checkout_date']; ?>" required><br>
        <label for="room_type">Room Type:</label>
        <input type="text" name="room_type" id="room_type" value="<?php echo $row['room_type']; ?>" required><br>
        <input type="submit" value="Update Booking">
    </form>
    <script src="js/script.js"></script>
</body>
</html>
