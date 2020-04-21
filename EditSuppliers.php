<?php
require('Database.php');

if(isset($_POST['update']))
{
    $sname=$_POST['supplierName'];
    $scode=$_POST['supplierCode'];
    $sphone=$_POST['supplierPhone'];
    $sitem=$_POST['supplierItem'];
    $sprice=$_POST['supplierPrice'];
    $squantity=$_POST['supplierQuantity'];
}

UpdateSuppliers($sname,$scode,$sphone,$sitem,$sprice,$squantity)
?>