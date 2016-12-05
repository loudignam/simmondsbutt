<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "booxch5_NW";

// Create connection_aborted(oid)	
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


/*
SELECT products.id, product_name, company FROM `products` join purchase_order_details on products.id = purchase_order_details.product_id join purchase_orders on purchase_orders.id = purchase_order_details.purchase_order_id join suppliers on suppliers.id = purchase_orders.supplier_id
*/


$sql = "SELECT id, product_name, list_price,quantity_per_unit, category FROM `products`";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    ?> <tr>
    		<td><?php echo $row["id"]; ?></td>
    		<td><?php echo str_replace("booxch5_NW Traders ", "", $row["product_name"]); ?></td>
    		<td><?php echo $row["list_price"]; ?></td>
    		<td><?php echo $row["quantity_per_unit"]; ?></td>
    		<td><?php echo $row["category"]; ?></td>

    	</tr>

    <?php
	}

} 


$conn->close();



?>