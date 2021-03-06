<!DOCTYPE html>
<html>
    <header>
        <center>Items Page</center>
    </header>
    <title>The Search Bar</title>
    
    <style>
        /* * Copyright (c) 2012 Thibaut Courouble
 * Licensed under the MIT License
   ================================================== */

body {
    background: #f7f7f7;
    color: #404040;
    font-family: 'HelveticaNeue', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 13px;
    font-weight: normal;
    line-height: 20px;
}

a {
    color: #1e7ad3;
    text-decoration: none;
}

a:hover { text-decoration: underline }

.container, .main {
    width: 640px;
    margin-left: auto;
    margin-right: auto;
    height: 300px;
}

.main { margin-top: 50px }

input {
    font-family: 'HelveticaNeue', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-size: 13px;
    color: #555860;
}

.search {
    position: relative;
    margin: 0 auto;
    width: 300px;
}

.search input {
    height: 26px;
    width: 100%;
    padding: 0 12px 0 25px;
    background: white url("http://cssdeck.com/uploads/media/items/5/5JuDgOa.png") 8px 6px no-repeat;
    border-width: 1px;
    border-style: solid;
    border-color: #a8acbc #babdcc #c0c3d2;
    border-radius: 13px;
}

.search input:focus {
    outline: none;
    border-color: #66b1ee;
    box-shadow: 0 0 2px rgba(85, 168, 236, 0.9);
}

.search input:focus + .results { display: block }

.search .results {
    display: none;
    position: absolute;
    top: 35px;
    left: 0;
    right: 0;
    z-index: 10;
    padding: 0;
    margin: 0;
    border-width: 1px;
    border-style: solid;
    border-color: #cbcfe2 #c8cee7 #c4c7d7;
    border-radius: 3px;
    background-color: #fdfdfd;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
}

.search .results li { display: block }

.search .results li:first-child { margin-top: -1px }

.search .results li:first-child:before, .search .results li:first-child:after {
    display: block;
    content: '';
    width: 0;
    height: 0;
    position: absolute;
    left: 50%;
    margin-left: -5px;
    border: 5px outset transparent;
}

.search .results li:first-child:before {
    border-bottom: 5px solid #c4c7d7;
    top: -11px;
}

.search .results li:first-child:after {
    border-bottom: 5px solid #fdfdfd;
    top: -10px;
}

.search .results li:first-child:hover:before, .search .results li:first-child:hover:after { display: none }

.search .results li:last-child { margin-bottom: -1px }

.search .results a {
    display: block;
    position: relative;
    margin: 0 -1px;
    padding: 6px 40px 6px 10px;
    color: #808394;
    font-weight: 500;
    text-shadow: 0 1px #fff;
    border: 1px solid transparent;
    border-radius: 3px;
}

.search .results a span { font-weight: 200 }

.search .results a:before {
    content: '';
    width: 18px;
    height: 18px;
    position: absolute;
    top: 50%;
    right: 10px;
    margin-top: -9px;
    background: url("http://cssdeck.com/uploads/media/items/7/7BNkBjd.png") 0 0 no-repeat;
}

.search .results a:hover {
    text-decoration: none;
    color: #fff;
    text-shadow: 0 -1px rgba(0, 0, 0, 0.3);
    border-color: #2380dd #2179d5 #1a60aa;
    background-color: #338cdf;
    box-shadow: inset 0 1px rgba(255, 255, 255, 0.2), 0 1px rgba(0, 0, 0, 0.08);
}

.lt-ie9 .search input { line-height: 26px }
    </style>
    
    <body>
        <section class="main">
	 <form class="search" method="post" action="index.html" >
		 <input type="text" name="q" placeholder="Search..." />
		 <ul class="results" >
			 <li><a href="index.html"><br /><span><?php echo $row["category"]; ?></span></a></li>
			 <li><a href="index.html"><br /><span></span></a></li>
	 		 <li><a href="index.html"><br /><span></span></a></li>
    </body>
    
         
    <p><?php $result ?></p>
</html>
            
<?php

include_once 'NW_DBConnection.php';

/*
$servername = "localhost";
$username = "root";
$password = "";
$database = "booxch5_NW";
*/

// Create connection_aborted(oid)	
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


/*
SELECT products.id, product_name, company FROM `products` join purchase_order_details on products.id = purchase_order_details.product_id join purchase_orders on purchase_orders.id = purchase_order_details.purchase_order_id join suppliers on suppliers.id = purchase_orders.supplier_id
*/


$items = "SELECT product_name, list_price, quantity_per_unit, category FROM `products`";

$result = mysqli_query($conn, $items);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    ?> <tr>
    		<td><?php echo str_replace("booxch5_NW Traders ", "", $row["product_name"]); ?></td>
    		<td><?php echo $row["list_price"]; ?></td>
    		<td><?php echo $row["quantity_per_unit"]; ?></td>
    		<td><?php echo $row["category"]; ?></td>
            <br>

    	</tr>

    <?php
	}

} 


$conn->close();

?>