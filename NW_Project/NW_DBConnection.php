<?php session_start();?>

<?php ///DB CONNECTION

$servername = "localhost";
$username = "root";
$password = "";
$database = "booxch5_nw";

// Create connection_aborted(oid)	
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


//this is your SQL Statement
$sql = "SELECT id, company, address, city, state_province, zip_postal_code, country_region FROM suppliers"; //change this for our SQL Statement

//this is where your SQL Statement runs
$result = mysqli_query($conn, $sql);
$output= "";

//this is where your iterate through your SQL statement output
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      $output .= $row["id"] . "&emsp;" . "<br>";
    }

} else {
    echo "0 results";
}

/* this outputs the user ids
echo $output;
*/

$conn->close();

//END DB and SQL Statements ?>
