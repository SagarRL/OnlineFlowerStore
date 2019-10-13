<?php 
$pid=isset($_GET['id']) ? $_GET['id']:"";
$quantity=isset($_GET['quantity']) ?$_GET['quantity']:1;

$quantity= $quantity<=0 ? 1:$quantity;

include_once 'dbconnection.php';

include_once "cart_item.php";

$database= new Database();
$db = $database->getConnection();

$cart_item= new CartItem($db);



$cart_item->u_id=1;
$cart_item->pid= $pid;
$cart_item->quantity= $quantity;

if($cart_item->exists()){
	
	
	header("Location:cart.php?action=exists");
}

else {
	if($cart_item->create()){
	header("Location:product1.php?id={$pid} &action=added");
}


else
{
	
	header("Location:product1.php?id={$pid}&action=unnable_to_add");
	
}
}
	?>

  