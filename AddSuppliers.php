<?php
require('Database.php');

$supplierName=$_POST['supplierName'];
$supplierCode=$_POST['supplierCode'];
$supplierPhone=$_POST['supplierPhone'];
$supplierItem=$_POST['supplierItem'];
$supplierPrice=$_POST['supplierPrice'];
$supplierQuantity=$_POST['supplierQuantity'];

AddSuppliers($supplierName,$supplierCode,$supplierPhone,$supplierItem,$supplierPrice,$supplierQuantity);
?>