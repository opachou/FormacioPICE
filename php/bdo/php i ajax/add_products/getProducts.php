<?php

$con = new mysqli("localhost", "root", "", "northwind");


$query = "SELECT * from products";

$result = $con->query($query);

while ($products = $result->fetch_assoc()) {
    echo utf8_encode("<tr><td>" . $products['ProductName'] . "</td><td>" . $products['SupplierID'] . "</td><td>" . $products['CategoryID'] . "</td><td>" . $products['Discontinued'] . "</td></tr>");
}

?>