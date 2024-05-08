<?php

include 'database.php';

$min_customer_id = 100; // Assuming a minimum starting ID
$max_customer_id = 999999; // Assuming a maximum ID range
$customer_id = rand($min_customer_id, $max_customer_id);
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$cabin_id = $_POST['cabin'];
$event_id = $_POST['event'];

echo "<script>";
echo "console.log('Cabin ID: " . $cabin_id . "');";
echo "console.log('Event ID: " . $event_id . "');";
echo "</script>";

$sqlstatement = $conn->prepare("INSERT INTO customer_booking values(?, ?, ?, ?, ?, ?, ?, ?)");
$sqlstatement->bind_param("isssssii", $customer_id, $name, $email, $phone, $start_date, $end_date, $event_id, $cabin_id);
$sqlstatement->execute(); //execute the query
   echo $sqlstatement->error; //print an error if the query fails


if ($sqlstatement->query($sql) === TRUE) {
    echo "Booking successfully submitted!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sqlstatement->close();
?>