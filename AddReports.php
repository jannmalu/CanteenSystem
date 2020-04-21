<?php
require ('Database.php');

$sID=$_POST['studentID'];
$sName=$_POST['studentName'];
$pEmail=$_POST['parentEmail'];
$aReceived=$_POST['amountReceived'];

AddReports($sID,$sName,$pEmail,$aReceived);

?>