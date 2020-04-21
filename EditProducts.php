<?php
require('Database.php');

if(isset($_POST['update']))
{
    $name=$_POST['productName'];
    $image=$_POST['productImage'];
    $quantity=$_POST['productQuantity'];
    $price=$_POST['productPrice'];
    $code=$_POST['productCode'];
}

UpdateProducts($name,$image,$quantity,$price,$code)
?>