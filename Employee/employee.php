<html>
<style>
table, th, td {
  border: 1px solid black;
}
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
 function displayFaculty() {
	 global $conn; //reference the global connection object (scope)
	 $sql = "SELECT customer_id, Name, Phone FROM customer_booking";
         $result = $conn->query($sql);

	    if ($result->num_rows > 0) {
	       // Setup the table and headers
	       echo "<table><tr><th>Customer_ID</th><th>Name</th><th>Phone</th><th>Click To Remove</th></tr>";
	      // output data of each row into a table row
	      while($row = $result->fetch_assoc()) {
	          echo "<tr><td>".$row["customer_id"]."</td><td>".$row["Name"]."</td><td> ".$row["Phone"]."</td><td><a href=\"employee.php?form_submitted=1&customer_id=".$row["customer_id"]."\">Remove</a></td></tr>";
	          }
	     echo "</table>"; // close the table
	     echo "There are ". $result->num_rows . " results.";
	    // Don't render the table if no results found
	   } else {
	     echo "0 results";
		                                                                                                                   }
  }


?>


</style
<body>
<p><h2>Current Bookings:</h2></p>
<?php
displayFaculty();
?>
<form action="employee.php" method=get>
                <input type="hidden" name="form_submitted" >
                <input type="hidden" name="customer_id" >
</form>


<?php //starting php code again!
if (isset($_GET["form_submitted"])){
  if (!empty($_GET["customer_id"]) && !empty($_GET["form_submitted"]))
{
   $profID = $_GET["customer_id"]; //gets id from the form
   $sqlstatement = $conn->prepare("DELETE FROM customer_booking where customer_id =?"); //prepare the statement
   $sqlstatement->bind_param("s",$profID); //insert the variables into the ? in the above statement
   $sqlstatement->execute(); //execute the query
   echo $sqlstatement->error; //print an error if the query fails
   $sqlstatement->close();
 }
 else {
	 echo "<b> Error: Something went wrong with the form.</b>";
 }
header("Refresh:0;url=employee.php"); //refresh the page to show the faculty is gone
}
   $conn->close();
  ?> <!-- this is the end of our php code -->
</body>
</html>
