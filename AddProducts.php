<?php
require ('Database.php');

$name=$_POST['productName'];
$image=$_POST['productImage'];
$quantity=$_POST['productQuantity'];
$price=$_POST['productPrice'];
$code=$_POST['productCode'];

AddProducts($name,$image,$quantity,$price,$code);

?>