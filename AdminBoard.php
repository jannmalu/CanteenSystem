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
        <link rel="stylesheet" href="Bootstrap/css/dashboard.css" type="text/css">
        <link rel="icon" href="Bootstrap/Images/Logo.png" type="image/x-icon">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
                <li class="active"><a href="AdminBoard.php">Dashboard</a></li>
                <li><a href="Products.php">Products</a></li>
                <li><a href="Reports.php">Reports</a></li>
                <li><a href="Orders.php">Orders</a></li>
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
                    <h1><span class="glyphicon glyphicon-cog" aria-hidden="true">Dashboard</span><small> Manage the canteen records</small></h1>
                </div>
            </div>
        </div>
    </header>

    <!--The Breadcrumb-->
    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">Dashboard</li>
            </ol>
        </div>
    </section>

    <!--The Side Navigation-->
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list-group">
                        <a href="AdminBoard.php" class="list-group-item list-group-item-action active main-colour-bg">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"> Dashboard
                        </a>
                        <a href="Products.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-scissors"> Products</span></a>
                        <a href="Reports.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list-alt"> Reports</span></a>
                        <a href="Orders.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list-alt"> Orders</span></a>
                        <a href="Suppliers.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-shopping-cart"> Suppliers</span></a>
                        <a href="Users.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-user"> Users</span></a>
                        <a href="Loginpage.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-log-out"> Logout</span></a>
                    </div>
                </div>

                <!--The Panel-->
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-colour-bg">
                            <h3 class="panel-title">System Overview</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true">2</span></h2> 
                                    <h5>Users</h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-usd" aria-hidden="true">5,000</span></h2> 
                                    <h5>Money Per Day</h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-scissors" aria-hidden="true">7</span></h2> 
                                    <h5>Products</h5>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="well dash-box">
                                    <h2><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true">7</span></h2> 
                                    <h5>Suppliers</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
