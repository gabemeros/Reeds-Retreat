<?php
include 'database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$cabin_id = $_POST['cabin'];
$event_id = $_POST['event'];

$sql = "INSERT INTO customer_booking (name, email, phone, start_date, end_date, cabin, event) 
        VALUES ('$name', '$email', '$phone', '$start_date', '$end_date', '$cabin_id', '$event_id')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successfully submitted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>