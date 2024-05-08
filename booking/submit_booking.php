<?php


$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$dbname = "gmeros"; // Your MySQL database name
$username = "gmeros"; 
$password = "5pVKqzx2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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