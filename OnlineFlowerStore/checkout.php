<?php
session_start();
include 'dbconnection1.php';
$error=false;
include_once "product.php";
include_once "p_image.php";
include_once "cart_item.php";

$database = new Database();
$db=$database->getConnection();

$product = new Product($db);
$p_image = new ProductImage($db);
$cart_item = new CartItem($db);

$page_title="Checkout";
if(isset($_POST['checkout'])) {
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$pnum = mysqli_real_escape_string($con,$_POST['pnum']);
	$address = mysqli_real_escape_string($con,$_POST['address']);
	$city = mysqli_real_escape_string($con,$_POST['city']);
	$pincode = mysqli_real_escape_string($con,$_POST['pincode']);
	$state = mysqli_real_escape_string($con,$_POST['state']);
	$payment = mysqli_real_escape_string($con,$_POST['payment']);
	
	if(!preg_match("/^[a-zA-Z]+$/",$name)) {
		$error =true;
		$name_error="Name must contain only alphabets and space";
		
	}
	if (!$error){
		
		if(mysqli_query($con, "INSERT INTO d_details(name,pnum,address,city,pincode,state,payment) VALUES('" . $name . "', '" . $pnum . "', '" .$address . "','". $city ."','".$pincode ."','".$state ."', '".$payment."')"))
		{
		 header("Location:place_order.php");
				}	
				else{
			$errormsg="Error ...Please try again later!";
			
		}	
}
			
}

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



 footer {
      background-color: #555;
      color: white;
      padding: 5px;
    }
	
  .text-align-center{ text-align:center; }
.f-w-b{ font-weight:bold; }
.display-none{ display:none; }
 
.w-5-pct{ width:5%; }
.w-10-pct{ width:10%; }
.w-15-pct{ width:15%; }
.w-20-pct{ width:20%; }
.w-25-pct{ width:25%; }
.w-30-pct{ width:30%; }
.w-35-pct{ width:35%; }
.w-40-pct{ width:40%; }
.w-45-pct{ width:45%; }
.w-50-pct{ width:50%; }
.w-55-pct{ width:55%; }
.w-60-pct{ width:60%; }
.w-65-pct{ width:65%; }
.w-70-pct{ width:70%; }
.w-75-pct{ width:75%; }
.w-80-pct{ width:80%; }
.w-85-pct{ width:85%; }
.w-90-pct{ width:90%; }
.w-95-pct{ width:95%; }
.w-100-pct{ width:100%; }
 
.m-t-0px{ margin-top:0px; }
.m-b-10px{ margin-bottom:10px; }
.m-b-20px{ margin-bottom:20px; }
.m-b-30px{ margin-bottom:30px; }
.m-b-40px{ margin-bottom:40px; }
 
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
 
.blueimp-gallery>.prev, .blueimp-gallery>.next{ border:none; }
 
.update-quantity-form {
    width: 150px;
    float: left;
    margin: 0 10px 0 0;
}
 
.cart-row {
    border-bottom: thin solid #f1f1f1;
    overflow: hidden;
    width: 100%;
    padding: 20px 0 20px 0;
}
 
.product-link{
    color:#000000;
}
 
.product-link:hover{
    color:#000000;
    text-decoration:none;
}
 
.product-img-thumb {
    margin: 0 0 10px 0;
    width: 100%;
    cursor: pointer;
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
		<li  ><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"><?php $cart_item->u_id=1;
		$cart_count=$cart_item->count();?>Cart<span class="badge" id="comparison-count"><?php echo $cart_count;?></span></span> </a></li>
		<li  ><a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span>  LogOut</a></li>
</ul>
			<?php }?>
		</div>


			
</div>
</nav>
<?php
$cart_count=$cart_item->count();
if($cart_count>0){
	$cart_item->u_id="1";
	$stmt=$cart_item->read();
	
	$total=0;
	$item_count=0;
	
	 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $sub_total=$price*$quantity;
 
        echo "<div class='cart-row'>";
            echo "<div class='col-md-8'>";
 
                echo "<div class='product-name m-b-10px'><h4>{$name}</h4></div>";
                echo $quantity>1 ? "<div>{$quantity} items</div>" : "<div>{$quantity} item</div>";
 
            echo "</div>";
 
            echo "<div class='col-md-4'>";
                echo "<h4>&#8377;" . number_format($price, 2, '.', ',') . "</h4>";
            echo "</div>";
        echo "</div>";
 
        $item_count += $quantity;
        $total+=$sub_total;
    }
 
    echo "<div class='col-md-12 text-align-center'>";
        echo "<div class='cart-row'>";
            if($item_count>1){
                echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
            }else{
                echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
            }
            echo "<h4>&#8377;" . number_format($total, 2, '.', ',') . "</h4>";
 
           
        echo "</div>";
    echo "</div>";
 
}
 
else{
    echo "<div class='col-md-12'>";
        echo "<div class='alert alert-danger'>";
            echo "No products found in your cart!";
        echo "</div>";
    echo "</div>";
}
 ?>
 <div class="container">

	<div class="row">
	
		<div class="col-md-4 col-md-offset-4 well">
		
			<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="signupform">
			<fieldset>
			<legend>Delivery Details</legend>
					
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="" class="form-control"/>
						<span class="text-danger"></span>
					</div>
					<div class="form-group">
						<label for="name">Phone Number</label>
						<input type="text" name="pnum" placeholder="Phonenumber" required value="" class="form-control"/>
						
						
					</div>
							
					<div class ="form-group">
						<label for="name"> Adress</label>
						<textarea id="" name="address" placeholder="Adress" required value="" class="form-control"></textarea>
						
					</div>
					
					<div class ="form-group">
						<label for="name"> City</label>
						<input type="text" name="city" placeholder="City" required  class="form-control"/>
						
					</div>
								<div class ="form-group">
						<label for="name"> Pincode</label>
						<input type="text" name="pincode" placeholder="Pincode" required  class="form-control"/>
						
					</div>
					<div class ="form-group">
						<label for="name"> State</label>
						<input type="text" name="state" placeholder="State" required  class="form-control"/>
					</br>
					
				
			<center><div class ="form-group">
	<label for="name">	Payment Option	<select name="payment" id="payment">
<br>

<option value="Credit "> Credit Card</option>
<option value="Debit">Debit Card</option>
<option value="Net" disabled>Net Banking</option><br>
<option value="COD">COD</option>

</select>
<br/>
<br/>
			<input  class='btn btn-lg btn-success m-b-10px' type="submit" value="Place Order" name="checkout">
           <center><span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		  </center>
           
				</div>
</div>
</div>
</div>
		</div>		
				</fieldset>
				</form>
			



</body>
</html>