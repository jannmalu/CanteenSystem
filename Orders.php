<?php
session_start();
require ('Database.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Canteen | Admin Board</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="Bootstrap/css/products.css" type="text/css">
        <script src="stylesheet" href="Bootstrap/js/mainjs.js" type="text/javascript"></script>
        <link rel="icon" href="Bootstrap/Images/Logo.png" type="image/x-icon">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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
                <li><a href="Products.php">Products</a></li>
                <li><a href="Reports.php">Reports</a></li>
                <li class="active"><a href="Orders.php">Orders</a></li>
                <li><a href="Suppliers.php">Suppliers</a></li>
                <li><a href="Users.php">Users</a></li>
                <li><a href="Loginpage.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!--The Body-->
    <header id ="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true">Orders</span><small> View all the orders</small></h1>
                </div>
            </div>
        </div>
    </header>

    <!--The Breadcrumb-->
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard > Orders</li>
            </ol>
        </div>
    </section>

    <!--The Products-->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="AdminBoard.php" class="list-group-item list-group-item-action ">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true" > Dashboard
                        </a>  
                        <a href="Products.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-scissors"> Products</a>
                        <a href="Reports.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list-alt"> Reports</span></a>
                        <a href="Orders.php" class="list-group-item list-group-item-action active main-colour-bg"><span class="glyphicon glyphicon-list-alt"> Orders</span></a>
                        <a href="Suppliers.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-shopping-cart"> Suppliers</span></a>
                        <a href="Users.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-user"> Users</span></a>
                        <a href="Loginpage.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-log-out"> Logout</span></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-colour-bg">
                            <h3 class="panel-title">All Orders</h3>
                        </div>
                        <div class="panel-body">
                             <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Grand Total</th>
                                        <th>Date Time</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php 
                                     $sql="SELECT * FROM `order_table`";
                                     $table=OrdersTable();

                                     if($table->num_rows>0)
                                     {
                                         while($row=$table->fetch_assoc())
                                         {
                                             echo "<tr>".
                                             "<td>".$row['orderID']."</td>".
                                             "<td>".$row['grandTotal']."</td>".
                                             "<td>".$row['dateCreated']."</td>".
                                             "<td>".$row['status']."</td>".
                                             "</tr>";
                                        }
                                     }
                                    ?>
                                     </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>