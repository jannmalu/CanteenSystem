<?php
require_once './vendor/autoload.php';
require("Database.php");
session_start();
$link=connection();

$spent= $_SESSION["grandTotal"];
$sql = "INSERT INTO order_table ( grandTotal)
VALUES ( '$spent')";

if ($link->query($sql) === TRUE)
{
    
} 
else 
{
    echo "Error: " . $sql . "<br>" . $link->error;
}

$link->close();

?>
<?php
if(isset($_POST["Place_Order"])){


    // Checking For Blank Fields..
    if($_POST["studentID"]==""||$_POST["studentName"]==""||$_POST["parentEmail"]==""||$_POST["studentClass"]==""){
    echo "Fill All Fields..";
    }else{
        $studentID=$_POST['studentID'];
        $studentName=$_POST['studentName'];
        $parentEmail=$_POST['parentEmail'];
        $studentClass=$_POST['studentClass'];
        AddStudents($studentID,$studentName,$parentEmail,$studentClass);
        
    // Check if the "Sender's Email" input field is filled out
    $email=$_POST['parentEmail'];
    // Sanitize E-mail Address
    $email =filter_var($email, FILTER_SANITIZE_EMAIL);
    // Validate E-mail Address
    $email= filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email){
    echo "Invalid Sender's Email";
    }
    else{
    $subject = "Your Child's Order Report";
    $message = "
        <div class ='heading-logo'>
        <link href='https://fonts.googleapis.com/css?family=Tangerine|Zilla+Slab&display=swap' rel='stylesheet'>
            <h3 class='navbar-brand' style='font-family:Zilla Slab,serif; text-align:center;font-size:40px'>The <span style='color:orange'>Canteen</span></h3>
        </div>
        <div class='information-table text-center'
            <h4 style='font-size:22px;font-family:Zilla Slab,serif'>Below is your child's order report.</h4><br>
            <table class='table table-hover'>
                <thead>
                    <tr>
                        <th style='font-family:Zilla Slab,serif;border-bottom:1px solid #ddd;padding:20px'>Student Name</th>
                        <th style='font-family:Zilla Slab,serif;border-bottom:1px solid #ddd;padding:20px'>Student ID</th>
                        <th style='font-family:Zilla Slab,serif;border-bottom:1px solid #ddd;padding:20px'>Amount Spent</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style='font-family:Zilla Slab,serif;border-bottom:1px solid #ddd;padding:20px'>$studentName</td>
                        <td style='font-family:Zilla Slab,serif;border-bottom:1px solid #ddd;padding:20px'>$studentID</td>
                        <td style='font-family:Zilla Slab,serif;border-bottom:1px solid #ddd;padding:20px'>Ksh.$spent</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br><br><br>
        <div class='regards-table'>
            <h4 style='font-size:18px;font-family:Zilla Slab,serif'> Contact Us At:+25470000000 for any inquries.<br><br>
            Kind regards,<br>
            School Administration.</h4>
        </div>";

    $mailmessage="The mail has been sent";
    $mailmsg=$_SESSION[$mailmessage];
    $from = 'theschoolcanteen@gmail.com';
    $to = $email;
    $subject = adopt($subject);

    $headers = ['From' => $from,'To' => $to, 'Subject' => $subject];

    $mime = new Mail_mime();
    // $mime->setTXTBody($text);
    $mime->setHTMLBody($message);

    $body = $mime->get();
    $headers = $mime->headers($headers);

    // Gmail smtp server settings
    $host = 'smtp.gmail.com';
    $username = 'theschoolcanteen@gmail.com'; //insert the email it will send from
    $password = 'thecanteen1234'; //insert the password of the email
    $port = '587';
    
    $smtp = Mail::factory('smtp', [
        'host' => $host,
        'auth' => true,
        'username' => $username,
        'password' => $password,
        'port' => $port
    ]);

    $mail = $smtp->send($to, $headers, $body);
    
if (PEAR::isError($mail)) {
	echo('<p>' . $mail->getMessage() . '</p>');
    echo 400;
} else {
    // echo('<p>Message successfully sent!</p>');
    header("Location:PlaceOrder.php");
}


    // echo "Your mail has been sent successfuly ! Thank you for your feedback";
    }
    }
    }

    function adopt($text) {
        return '=?UTF-8?B?'.Base64_encode($text).'?=';
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>The Canteen | Admin Board</title>
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
                    <h1><span class="glyphicon glyphicon-scissors" aria-hidden="true">Products</span><small> Sell all the products</small></h1>
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
                        <a href="Orders.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list-alt"> Orders</span></a>
                        <a href="Loginpage.php" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-log-out"> Logout</span></a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-colour-bg">
                            <h3 class="panel-title">Checkout</h3>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h3 class="check-title">Details</h3>
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="id">Student ID</label>
                                            <input type="text" class="form-control" name="studentID" value="<?php echo !empty($postData['studentID'])?$postData['studentID']:''; ?>" placeholder="Enter Student ID" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="name">Student Name</label>
                                            <input type="text" class="form-control" name="studentName" value="<?php echo !empty($postData['studentName'])?$postData['studentName']:''; ?>" placeholder="Enter Student Name"required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email">Parent's Email Address</label>
                                        <input type="email" class="form-control" name="parentEmail" value="<?php echo !empty($postData['parentEmail'])?$postData['studentEmail']:''; ?>" placeholder="Enter Parent's Email Address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="class">Student Class</label>
                                        <input type="text" class="form-control" name="studentClass" value="<?php echo !empty($postData['studentClass'])?$postData['studentClass']:''; ?>" placeholder="Enter Student Class" required>
                                    </div>
                                    <div class="mb-3 place-button">
                                        <input type="hidden" name="action" value="placeOrder"/>
                                        <input class="btn btn-default btn-lg btn-block" type="submit" name="Place Order" value="Place Order">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>