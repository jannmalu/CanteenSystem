<?php
require ('Database.php');
$username = $_POST['inputUsername'];
$password = $_POST['inputPassword'];

$position = getUserCredentials($username);
$pos=$position->fetch_assoc();

if(!$pos)
{
    header("location:Loginpage.php");
}
else if($pos["position"] == "Admin")
{
    $_SESSION["username"] = $user;
    header("location:AdminBoard.php");
}
else if($pos["position"] == "Canteen Manager")
{
    $_SESSION["username"] = $user;
    header("location:ManagerBoard.php");
}
?>