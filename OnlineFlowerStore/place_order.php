<?php
session_start();
include_once "dbconnection.php";
include_once "cart_item.php";

$database = new Database();
$db = $database->getConnection();
 

$cart_item = new CartItem($db);

	
$cart_item->u_id=1; 
$cart_item->deleteByUser();


$page_title="Thank You!";

?>
<html>
<head>
  <title>Welcome to The Secret Garden</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

<style>
.navbar {
width: 100%;


font-size: 12px;
overflow: auto;
}
.navbar a{

text-decoration:none;
display: block;
font-size: 16px;

background-repeat: no-repeat;
padding: 8px 0 8px 24px;
text-align: center;
font-family: roboto;
}

.navbar a:after{
width:0;
height:2px;
background:#fcf;
content:"";
position:absolute;
left:0;
bottom:0;
transition:all linear 0.3s;
}
.navbar a:hover:after{
width:100%;
}
.left-side{
float:left;
}
.right-side{
float:right;
}



 
 
.stock-text {
    font-weight: bold;
    color: #008a00;
}
 
.stock-text-red{
    font-weight:bold;
    color:#b12704;
}
 
.product-detail {
    font-weight: bold;
    margin: 0 0 5px 0;
}
 

.cart-row {
    border-bottom: thin solid #f1f1f1;
    overflow: hidden;
    width: 100%;
    padding: 20px 0 20px 0;
}

 
 
</style>
</head>
<body >


<nav class="navbar navbar-inverse" role="navigation">
	
		
	<div class="collapse navbar-collapse" id="navbar1" >
	<div class="left-side">
		<ul class ="nav navbar-nav">
		<li  ><a href="page1.php"><span class="glyphicon glyphicon-home"> </span> </a></li>
		
	
	</div>
		<div class="right-side">	
			<ul class="nav navbar-nav" name="abt">
				
		
			<?php if(isset($_SESSION['usr_id'])){ ?>
			<li ><font size="3"><p class="navbar-text glyphicon glyphicon-user "> <?php echo $_SESSION['usr_name'];?></p></font></li>
		
		<li  ><a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span>  Log Out</a></li>
</ul>
			<?php }?>
		</div>


			
</div>
</nav>
<?php

echo "<div class='col-md-12'>";

echo"<div class='alert alert-success'>";
echo " <strong> Thank you  ";
echo $_SESSION['usr_name']   ;
echo"   Your order has been placed!</strong>  !!";
echo"</div>";

echo"</div>";

?>

 
		
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>