<?php
require("Database.php");
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
                <li><a href="Orders.php">Orders</a></li>
                <li class="active"><a href="Suppliers.php">Suppliers</a></li>
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
                    <h1><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">Suppliers</span><small> Manage all the suppliers</small></h1>
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
                        <a href="Orders.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list-alt"> Orders</span></a>
                        <a href="Suppliers.php" class="list-group-item list-group-item-action active main-colour-bg"><span class="glyphicon glyphicon-shopping-cart"> Suppliers</span></a>
                        <a href="Users.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-user"> Users</span></a>
                        <a href="Loginpage.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-log-out"> Logout</span></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-colour-bg">
                            <h3 class="panel-title">All Suppliers</h3>
                        </div>
                        <div class="panel-body">
                            <div class="pull-right">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addSupplier">Add Supplier</button>
                            </div>
                            <br>
                            <br>
                             <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Supplier ID</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier Code</th>
                                        <th>Phone Number</th>
                                        <th>Item Supplied</th>
                                        <th>Item Price</th>
                                        <th>Item Quantity</th>
                                        <th>Date Supplied</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                     $sql="SELECT * FROM `supplier_table`";
                                     $table=SuppliersTable();

                                     if($table->num_rows>0)
                                     {
                                         while($row=$table->fetch_assoc())
                                         {
                                             echo "<tr>".
                                             "<td>".$row['supplierID']."</td>".
                                             "<td>".$row['supplierName']."</td>".
                                             "<td>".$row['supplierCode']."</td>".
                                             "<td>".$row['supplierPhone']."</td>".
                                             "<td>".$row['supplierItem']."</td>".
                                             "<td>Ksh.".$row['supplierPrice']." per piece</td>".
                                             "<td>".$row['supplierQuantity']."</td>".
                                             "<td>".$row['date']."</td>".
                                             "<td>".$row['status']."</td>".
                                             "<td>";
                                    ?>
                                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#editSupplier"><span class='glyphicon glyphicon-pencil' name='edit' aria-hidden='true'></span></button>
                                    <?php
                                             "</td>";
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

    <!--The Modal-->
    

    <!--Add Suppliers-->
    <div class="modal fade" id="addSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                 <!--The Form-->
                <form action="AddSuppliers.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span></button>
                        <h4 class="modal-title" id="myModalLabel">Add Supplier</h4>
                    </div>
                    <div class ="modal-body">
                        <div class="form-group">
                            <label>Supplier Name</label>
                            <input type="text" class="form-control" name="supplierName" placeholder="Supplier Name" required>
                        </div>
                        <div class="form-group">
                            <label>Supplier Code</label>
                            <input type="text" class="form-control" name="supplierCode" placeholder="Supplier Code" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="supplierPhone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label>Item Supplied</label>
                            <input type="text" class="form-control" name="supplierItem" placeholder="Item Supplied" required>
                        </div>
                        <div class="form-group">
                            <label>Item Price</label>
                            <input type="text" class="form-control" name="supplierPrice" placeholder="Item Price" required>
                        </div>
                        <div class="form-group">
                            <label>Item Quantity</label>
                            <input type="text" class="form-control" name="supplierQuantity" placeholder="Item Quantity" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="close"class="btn" data-dismiss="modal">Close</button>
                        <button type="submit" name="save" class="btn btn-default">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Modal-->
    <div class="modal fade" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                 <!--The Form-->
                <form action="EditSuppliers.php" method="POST">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Suppliers</h4>
                    </div>
                    <div class ="modal-body">
                        <div class="form-group">
                            <label>Supplier Name</label>
                            <input type="text" class="form-control" name="supplierName" placeholder="Supplier Name" required>
                        </div>
                        <div class="form-group">
                            <label>Supplier Code</label>
                            <input type="text" class="form-control" name="supplierCode" placeholder="Supplier Code" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="supplierPhone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label>Item Supplied</label>
                            <input type="text" class="form-control" name="supplierItem" placeholder="Item Supplied" required>
                        </div>
                        <div class="form-group">
                            <label>Item Price</label>
                            <input type="text" class="form-control" name="supplierPrice" placeholder="Item Price" required>
                        </div>
                        <div class="form-group">
                            <label>Item Quantity</label>
                            <input type="text" class="form-control" name="supplierQuantity" placeholder="Item Quantity" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" name="close"class="btn" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-default">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>