<?php
session_start();
require ('Database.php');
require_once("dbController.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) 
{
switch($_GET["action"]) 
{
	case "add":
        if(!empty($_POST["productQuantity"])) 
        {
			$productByCode = $db_handle->runQuery("SELECT * FROM product_table WHERE productCode='" . $_GET["productCode"] . "'");
			$itemArray = array($productByCode[0]["productCode"]=>array('productName'=>$productByCode[0]["productName"], 'productCode'=>$productByCode[0]["productCode"], 'productQuantity'=>$_POST["productQuantity"], 'productPrice'=>$productByCode[0]["productPrice"], 'productImage'=>$productByCode[0]["productImage"]));
			
            if(!empty($_SESSION["cart_item"])) 
            {
                if(in_array($productByCode[0]["productCode"],array_keys($_SESSION["cart_item"])))
                {
                    foreach($_SESSION["cart_item"] as $k => $v) 
                    {
                            if($productByCode[0]["productCode"] == $k) 
                            {
                                if(empty($_SESSION["cart_item"][$k]["productQuantity"]))
                                {
									$_SESSION["cart_item"][$k]["productQuantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["productQuantity"] += $_POST["productQuantity"];
							}
					}
                }
                else
                {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
            }
            else 
            {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
        if(!empty($_SESSION["cart_item"])) 
        {
            foreach($_SESSION["cart_item"] as $k => $v) #
            {
					if($_GET["productCode"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Canteen | Manager Board</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="Bootstrap/css/productlist.css" type="text/css">
        <link rel="icon" href="Bootstrap/Images/Logo.png" type="image/x-icon">
        <!--Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Tangerine|Zilla+Slab&display=swap" rel="stylesheet">
    </head>
    <body>
    <!--The Navigation-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                    <a class="navbar-brand" href="Homepage.html">The <span>Canteen</span></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="AdminBoard.php">Dashboard</a></li>
                <li class="active"><a href="ProductList.php">Products</a></li>
                <li><a href="ManagerOrders.php">Orders</a></li>
                <li><a href="Loginpage.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!--The Body-->
    <header id ="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true">Products</span><small> Sell the available products</small></h1>
                </div>
            </div>
        </div>
    </header>

    <!--The Breadcrumb-->
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard > Products</li>
            </ol>
        </div>
    </section>

    <!--The Side Navigation-->
    <section id ="main">
        <div class ="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                    <a href="ManagerBoard.php" class="list-group-item list-group-item-action">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"> Dashboard
                        </a>
                        <a href="ProductList.php" class="list-group-item list-group-item-action active main-colour-bg"><span class="glyphicon glyphicon-scissors"> Productlist</span></a>
                        <a href="ManagerOrders.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list-alt"> Orders</span></a>
                        <a href="Loginpage.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-log-out"> Logout</span></a>
                    </div>
                </div>

                <div class="col-sm-9">
                 <div class="panel panel-default">
                    <div class="panel-heading main-colour-bg">
                        <h3 class="panel-title">Product List</h3>
                    </div>
                 <div class="panel-body ">
                        <div class="text-heading">The Shopping Cart</div>

                       <button class="btn btn-default text-center"><a id="btnEmpty" href="ProductList.php?action=empty">Empty Cart</a></button>
                        <?php
                        if(isset($_SESSION["cart_item"]))
                        {
                            $total_quantity = 0;
                            $grandTotal = 0;
                        ?>	
                        <table class="tbl-cart table table-hover">
                        <tbody>
                            <tr>
                                <th>Product Name</th>
                                <th>Product Code</th>
                                <th>Product Quantity</th>
                                <th>Unit Price</th>
                                <th>Price</th>
                                <th>Remove</th>
                            </tr>	
                        <?php
                        $count=0;		
                            foreach ($_SESSION["cart_item"] as $item)
                            {
                                $count=$count+2;
                                $_SESSION["count"]=$count;
                                $item_price = $item["productQuantity"]*$item["productPrice"];
                                ?>
                                        <tr>
                                            <td><?php echo $item["productName"]; ?></td>
                                            <td><?php echo $item["productCode"]; ?></td>
                                            <td><?php echo $item["productQuantity"]; ?></td>
                                            <td><?php echo "ksh ".$item["productPrice"]; ?></td>
                                            <td><?php echo "ksh ". number_format($item_price,2); ?></td>
                                            <td><a href="ProductList.php?action=remove&productCode=<?php echo $item["productCode"]; ?>" class="btnRemoveAction"><span class="glyphicon glyphicon-trash"></span></a></td>
                                        </tr>
                                        <?php
                                        
                                        
                                        $total_quantity += $item["productQuantity"];
                                        $grandTotal += ($item["productPrice"]*$item["productQuantity"]);
                                        $orderID=$grandTotal.$item["productCode"];
                                        $_SESSION["orderID"]=$orderID;
                                        $_SESSION["grandTotal"]=$grandTotal;
                                    
                            }

                                ?>
                        <a href="Checkout.php" class="btn btn-danger" name="checkout">Checkout</a>
                        <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "ksh ".number_format($grandTotal, 2); ?></strong></td>
                        <td></td>
                        </tr>
                        </tbody>
                        </table>		
                        <?php
                        }
                        else
                        {
                        ?>
                        <div class="no-records">Your Cart is Empty</div>
                        <?php 
                        }
                        ?>
                            <div class="col-sm-12">
                                    <div class="panel-body product-list">
                                        <div class="text-heading">Products</div>
                                        <?php
                                        $product_array = $db_handle->runQuery("SELECT * FROM product_table ORDER BY productID ASC");
                                        if (!empty($product_array)) 
                                        { 
                                            foreach($product_array as $key=>$value)
                                            {
                                        ?>

                                                <form method="post" action="ProductList.php?action=add&productCode=<?php echo $product_array[$key]["productCode"]; ?>">
                                                <div class="card col-lg-4">
                                                    <div class="card-body">
                                                        <img src="Bootstrap/Images/<?php echo $product_array[$key]["productImage"]; ?>">    
                                                        <h5 class="card-title"><?php echo $product_array[$key]["productName"]; ?></h5>
                                                        <h6 class="card-subtitle mb-2 text-muted">Price:  <?php echo "Ksh.".$product_array[$key]["productPrice"]; "/-" ?></h6>
                                                        <input type="text" class="productQuantity" name="productQuantity" value="1" size="2" />
                                                        <input type="submit" value="Add to Cart" class="btnAddAction btn btn-default" onclick='window.location.reload(true);'/>
                                                    </div>
                                                </div>
                                                </form> 
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                            </div>
                </div>
            </div>
        </div>
        <!---->
            </div>
        </div>
    </section>

</body>
</html>