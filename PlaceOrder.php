<?php
require("Database.php");
session_start();

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
                <li class="active"><a href="Products.php">Products</a></li>
                <li><a href="Loginpage.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <!--The Body-->
    <header id ="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1><span class="glyphicon glyphicon-scissors" aria-hidden="true">Products</span><small> Manage all the products</small></h1>
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
                        <a href="ProductList.php" class="list-group-item list-group-item-action active main-colour-bg"><span class="glyphicon glyphicon-scissors"> Products</a>
                        <a href="Loginpage.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-log-out"> Logout</span></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-colour-bg">
                            <h3 class="panel-title">Your Order</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row-order">
                                <div class="alert alert-success" role="alert">
                                    <p><?php 
                                    $mailmessage="The mail has been sent";
                                    echo $mailmessage ?></p>
                                </div>
                                <div class="pull-right">
                                    <button type="button" class="btn btn-default"><a href="ProductList.php?action=empty">Back</a></button>
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