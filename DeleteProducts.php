<?php
require('Database.php');
		$conn=connection();
		$productID=$_GET['productID'];
        $sql="DELETE FROM product_table WHERE productID =$productID";
   
        if($conn->query($sql) == TRUE)
        {
            header("Location:Products.php");
        }
        else
        {
            echo "Error: ". $sql . "<br>".$conn->error;
        }
?>
