<?php
include_once 'dbconnection.php';
$pid =isset($_GET['id'])? $_GET['id'] :"";
include_once "cart_item.php";

$database = new Database();
$db = $database->getConnection();

$cart_item= new CartItem($db);

$cart_item->u_id=1;

$cart_item->pid=$pid;
$cart_item->delete();

header('Location: cart.php?action=removed&id=' . $id);
?>