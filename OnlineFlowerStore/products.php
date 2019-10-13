<?php
session_start();
include_once 'dbconnection.php';

include_once "product.php";
include_once "p_image.php";
include_once "cart_item.php";

$database = new Database();
$db = $database->getConnection();
 

$product = new Product($db);
$product_image = new ProductImage($db);
$cart_item = new CartItem($db);


?>
<! DOCTYPE html >
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
		<li  ><a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span>  Log Out</a></li>
</ul>
			<?php }?>
		</div>


			
</div>
</nav>
<?php
$action =isset($_GET['action'])? $_GET['action']: "";

$page=isset($_GET['page']) ? $_GET['page'] : 1;
$records_per_page=6;
$from_record_num=($records_per_page *$page)-$records_per_page;


	$stmt=$product->read($from_record_num,$records_per_page);

$num=$stmt-> rowCount();

if($num>0)
{
	$page_url="products.php?";
	$total_rows=$product->count();

	include_once "p_template.php";
	
}
else{
	echo "<div class='col-md-12'>";
		echo "<div class='alert alert-danger'>No products found.</div>";
		echo "</div>";
		
}
?>
</br></br>
</br>
</br>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){

	$('.add-to-cart-form').on('submit',function(){
		var id=$(this).find('.product-id').text();
		var quantity=$(this).find('.cart-quantity').val();

			window.loaction.href="add_cart.php?id=" + id + "&quantity=" +quantity;
			return false;
	});
	
	$('.update-quantity-form').on('submit', function(){
 
    
    var id = $(this).find('.product-id').text();
    var quantity = $(this).find('.cart-quantity').val();
 
    
    window.location.href = "update_quantity.php?id=" + id + "&quantity=" + quantity;
    return false;
});
});
</script>
</body>
</html>


