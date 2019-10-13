<?php
session_start();
include_once "dbconnection.php";
include_once "product.php";
include_once "p_image.php";
include_once "cart_item.php";

$database = new Database();
$db = $database->getConnection();

$product = new Product($db);
$product_image = new ProductImage($db);

$id=isset($_GET['id'])?$_GET['id']:die('ERROR:missing ID.');
$action=isset ($_GET['action']) ?$_GET['action']:"";

$product->id=$id;
$product->readOne();

$page_title=$product->name;

$cart_item = new CartItem($db);

$id= isset ($_GET['id'])? $_GET['id'] :die('ERROR:missing ID.');

$action=isset ($_GET['action']) ?$_GET['action']:"";

$product->id=$id;
$product->readOne();

$page_title=$product->name;
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
		<li  ><a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span>  Log Out</a></li>
</ul>
			<?php }?>
		</div>


			
</div>
</nav>
<?php
echo "<div class='col-md-12'>";
    if($action=='added'){
        echo "<div class='alert alert-info'>";
            echo "Product was added to your cart!";
        echo "</div>";
    }
 
    else if($action=='unable_to_add'){
        echo "<div class='alert alert-info'>";
            echo "Unable to add product to cart.";
        echo "</div>";
    }
echo "</div>";

$product_image->pid=$id;

$stmt_product_image=$product_image->readByProductId();

$num_product_image=$stmt_product_image->rowCount();

echo "<div class='col-md-1'>";

if($num_product_image>0){
	while($row=$stmt_product_image->fetch(PDO::FETCH_ASSOC))
	{
		$product_image_name=$row['name'];
		$source="{$product_image_name}";
		echo "<img src='{$source}' class='product-img-thumb' data-img-id='{$row['id']}'/>";
		
	}
}
	else {
		echo"No images";
		}
echo "</div>";	

echo "<div class='col-md-4' id='product-img'>";
 
    
    $stmt_product_image = $product_image->readByProductId();
    $num_product_image = $stmt_product_image->rowCount();
 
    
    if($num_product_image>0){
      
        $x=0;
        while ($row = $stmt_product_image->fetch(PDO::FETCH_ASSOC)){
           
            $product_image_name = $row['name'];
            $source="{$product_image_name}";
            $show_product_img=$x==0 ? "display-block" : "display-none";
            echo "<a href='{$source}' target='_blank' id='product-img-{$row['id']}' class='product-img {$show_product_img}'>";
                echo "<img src='{$source}' style='width:100%;' />";
            echo "</a>";
            $x++;
        }
    }
else{ echo "No images."; }
echo "</div>";
echo "<div class='col-md-5'>";
 
    echo "<div class='product-detail'>Price:</div>";
    echo "<h4 class='m-b-10px price-description'>&#8377;" . number_format($product->price, 2, '.', ',') . "</h4>";
 
    echo "<div class='product-detail'>Product description:</div>";
    echo "<div class='m-b-10px'>";
        
        $page_description = htmlspecialchars_decode(htmlspecialchars_decode($product->description));
 
        
        echo $page_description;
    echo "</div>";
   
   echo "</div>";
 
  
echo "</div>";

echo "<div class='col-md-2'>";
   
    $cart_item->u_id=1; 
    $cart_item->pid=$id;
 
   
    if($cart_item->exists()){
        echo "<div class='m-b-10px'>This product is already in your cart.</div>";
        echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
            echo "Update Cart";
        echo "</a>";
    }
 
   
    else{
 
        echo "<form class='add-to-cart-form'>";
           
            echo "<div class='product-id display-none'>{$id}</div>";
 
            
            echo "<div class='m-b-10px f-w-b'>Quantity:</div>";
            echo "<input type='number' class='form-control m-b-10px cart-quantity' value='1' min='1' />";
 
          
            echo "<button style='width:100%;' type='submit' class='btn btn-primary add-to-cart m-b-10px'>";
                echo "<span class='glyphicon glyphicon-shopping-cart'></span> Add to cart";
            echo "</button>";
 
        echo "</form>";
    }
echo "</div>";
?>

</br>
</br>
</br>
</br>
</br>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>


<script>

$(document).on('mouseenter','.product-img-thumb',function(){

var data_img_id= $(this).attr('data-img-id');
$('.product-img').hide();
$('#product-img-'+data_img_id).show();
	
});


$(document).ready(function(){
	
	$('.add-to-cart-form').on('submit',function(){
		var id=$(this).find('.pid').text();
		var quantity=$(this).find('.cart-quantity').val();

			window.loaction.href="add_cart.php?id=" + id + "&quantity=" +quantity;
			return false;
	});
});
</script>
</body>
</html>