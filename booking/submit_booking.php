<?php
include 'database.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$message = $_POST['message'];
$cabin_id = $_POST['cabin_id'];

$sql = "INSERT INTO Cabin_Booking (customer_id, cabin_id, start_date, end_date, message) 
        VALUES ('$name', '$email', '$phone', '$start_date', '$end_date', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Booking successfully submitted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>