<?php
function connection()
{
    $servername="localhost";
    $username="root";
    $password="";
    $database="the_canteen";

    $conn = new mysqli($servername,$username,$password,$database);
    if($conn->connect_error)
    {
        die("Connection failed:".$conn->connect_error);
    }
    return $conn;
}
function Login($position,$username,$password)
{
    $conn=connection();
    $sql="SELECT * FROM user_table WHERE `position` = $position '&&' `username` = $username '&&' `userpassword` = $password";
    $result = $conn->query($sql);
    $row = mysql_fetch_array($result);

    while($row = $result->fetch_assoc())
    {
        $user = ($row['username']);
        $pass = ($row['userpassword']);

        if($user = $name && $pass = $pass)
        {
            session_start();
            $_SESSION["username"] = $user;
            $_SESSION["userpassword"] = $pass;
        }
        else
        {
            echo "WRONG CREDENTIALS";
        }
    }
}
function getUserCredentials($inputUsername)
{
    $conn = connection();
    $sql = "SELECT userpassword, position FROM user_table WHERE username = '$inputUsername'";
    $result = $conn->query($sql);
    return $result;
}
function AddProducts($name,$image,$quantity,$price,$code)
{
    $conn = connection();
    $sql = "INSERT INTO `product_table`(`productName`,`productImage`,`productQuantity`,`productPrice`,`productCode`)
    VALUES('$name','$image','$quantity','$price','$code');";
    
    if($conn->query($sql) == TRUE)
    {
        header("Location:Products.php");
    }
    else
    {
        echo "Error: ". $sql. "<br>" .$conn->error;
    }
}
function ProductsTable()
{
    $conn=connection();
    $sql="SELECT * FROM `product_table`";
    $result=$conn->query($sql);

    return $result;
}
function UsersTable()
{
    $conn=connection();
    $sql="SELECT * FROM `user_table`";
    $result=$conn->query($sql);

    return $result;
}
function AddReports($sID,$sName,$pEmail,$aReceived)
{
    $conn = connection();
    $sql = "INSERT INTO `report_table`(`studentID`,`studentName`,`parentEmail`,`amountReceived`)
    VALUES('$sID','$sName','$pEmail','$aReceived');";
    
    if($conn->query($sql) == TRUE)
    {
        header("Location:Reports.php");
    }
    else
    {
        echo "Error: ". $sql. "<br>" .$conn->error;
    }
}
function AddSuppliers($supplierName,$supplierCode,$supplierPhone,$supplierItem,$supplierPrice,$supplierQuantity)
{
    $conn = connection();
    $sql = "INSERT INTO `supplier_table`(`supplierName`,`supplierCode`,`supplierPhone`,`supplierItem`,`supplierPrice`,`supplierQuantity`)
    VALUES('$supplierName','$supplierCode','$supplierPhone','$supplierItem','$supplierPrice','$supplierQuantity');";

    if($conn->query($sql) == TRUE)
    {
        header("Location:Suppliers.php");
    }
    else
    {
        echo "Error: ". $sql. "<br>" .$conn->error;
    }
}
function AddStudents($studentID,$studentName,$parentEmail,$studentClass)
{
    $conn = connection();
    $sql = "INSERT INTO `student_table`(`studentID`,`studentName`,`parentEmail`,`studentClass`)
    VALUES('$studentID','$studentName','$parentEmail','$studentClass');";
    $result=$conn->query($sql);
    
    return $result;
}
function ReportsTable()
{
    $conn=connection();
    $sql="SELECT * FROM `report_table`";
    $result=$conn->query($sql);

    return $result;
}
function SuppliersTable()
{
    $conn=connection();
    $sql="SELECT * FROM `supplier_table`";
    $result=$conn->query($sql);

    return $result;
}
function OrdersTable()
{
    $conn=connection();
    $sql="SELECT * FROM `order_table`";
    $result=$conn->query($sql);

    return $result;
}
function AddCart()
{
    $conn=connection();
    $sql = "SELECT productCode FROM cart_table WHERE productCode =? ";
    $result = $conn->query($sql);
    return $result;
}
function UpdateProducts($name,$image,$quantity,$price,$code)
{
    $conn=connection();
    $stmt ="SELECT productID FROM product_table WHERE productName = '$name'";
    $result= $conn->query($stmt);

    while($row=$result->fetch_assoc())
    {
        $id = $row['productID'];
        $sql = "UPDATE product_table SET productName = '$name', productImage='$image', productQuantity='$quantity', productPrice='$price', productCode='$code' WHERE productName = '$name' ";

        if($conn->query($sql) == TRUE)
        {
            header("Location:Products.php");
        }
        else
        {
            echo "Error: ". $sql. "<br>" .$conn->error;
        }
    }
}
function UpdateReports($sID,$sName,$pEmail,$aReceived)
{
    $conn=connection();
    $stmt="SELECT reportID FROM report_table WHERE studentName ='$sName'";
    $result=$conn->query($stmt);

    while($row=$result->fetch_assoc())
    {
        $id=$row['reportID'];
        $sql="UPDATE report_table SET studentID ='$sID', studentName='$sName', parentEmail='$pEmail', amountReceived='$aReceived' WHERE studentName='$sName'";

        if($conn->query($sql) == TRUE)
        {
            header("Location:Reports.php");
        }
        else
        {
            "Error: ". $sql. "<br>" .$conn->error;
        }
    }
}
function UpdateSuppliers($sname,$scode,$sphone,$sitem,$sprice,$squantity)
{
    $conn= connection();
    $stmt="SELECT supplierID FROM supplier_table WHERE supplierCode='$scode'";
    $result =$conn->query($stmt);

    while($row =$result->fetch_assoc())
    {
        $id=$row['supplierID'];
        $sql="UPDATE supplier_table SET supplierName = '$sname', supplierCode = '$scode', supplierPhone ='$sphone', supplierItem ='$sitem', supplierPrice='$sprice',supplierQuantity ='$squantity' WHERE supplierCode ='$scode'";

        if($conn->query($sql) == TRUE)
        {
            header("Location:Suppliers.php");
        }
        else
        {
            echo "Error: ". $sql . "<br>".$conn->error;
        }
    }
}
function DeleteProducts()
{
   $conn=connection();
//    $stmt="SELECT productID FROM product_table WHERE productCode='$productCode'";
//    $result =$conn->query($stmt);
   
//    while($row =$result->fetch_assoc())
//    {
        $id=$_GET['productID'];
        $sql="DELETE FROM product_table WHERE productID =$productID";
   
        if($conn->query($sql) == TRUE)
        {
            header("Location:Products.php");
        }
        else
        {
            echo "Error: ". $sql . "<br>".$conn->error;
        }
    
}
?>