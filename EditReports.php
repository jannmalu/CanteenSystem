<?php
require('Database.php');

if(isset($_POST['update']))
{
    $sID=$_POST['studentID'];
    $sName=$_POST['studentName'];
    $pEmail=$_POST['parentEmail'];
    $aReceived=$_POST['amountReceived'];
}

UpdateReports($sID,$sName,$pEmail,$aReceived)
?>