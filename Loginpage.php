<!DOCTYPE html>
<html>
    <head>
        <title>The Canteen | Login</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="Bootstrap/css/mainstyle.css" type="text/css">
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
                <li><a href="Homepage.html">Home</a></li>
                <li class="active"><a href="Loginpage.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <!--The Body-->
    <div class="carousel-inner">
        <div class="carousel-item">
            <img src="Bootstrap/Images/Homepage.jpg">
        </div>
        <form class="form-signin" method="POST" action="LoginAction.php">
            <h2 class="form-logo">The<span> Canteen</span></h2>
            <h5 class="form-title">Enter your credentials</h5>

            <div class="form-label">
                 <span class="glyphicon glyphicon-user"></span>  <label for="position">Select Your Position</label>
                 <select name="position">
                      <option value="Admin">Admin</option>
                      <option value="Manager">Canteen Manager</option>
                 </select>
            </div>

            <div class="form-label">
                 <span class="glyphicon glyphicon-font"></span>  <label for="username">Enter Your Username</label>
                 <input type="text" name="inputUsername" placeholder="Enter Your Username" required>
            </div>

            <div class="form-label">
                 <span class="glyphicon glyphicon-lock"></span>  <label for="password">Enter Your Password</label>
                 <input type="password" name="inputPassword" placeholder="Enter Your Password" required>
            </div>

            <div class="form-button text-center">
                <button class="btn btn-outline-default btn-lg " type="submit">Login</button>
            </div>
        </form>
    </div>
    </body>
