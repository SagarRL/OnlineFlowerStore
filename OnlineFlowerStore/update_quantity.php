<?php

$pid =isset($_GET['id'])? $_GET['id'] :1;
$quantity =isset($_GET['quantity'])? $_GET['quantity'] :"";

$quantity=$quantity<=0 ? 1: $quantity;

include 'dbconnection.php';

include_once "cart_item.php";

$database = new Database();
$db = $database->getConnection();

$cart_item= new CartItem($db);

$cart_item->u_id=1;

$cart_item->pid=$pid;
$cart_item->quantity=$quantity;

if($cart_item->update()){
	header("Location: cart.php?action=updated");
	}
	else
	{
		header("Location: cart.php?action=unable_to_update");
		
	}
?>