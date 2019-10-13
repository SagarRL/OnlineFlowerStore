<?php


while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
	extract($row);
	
	echo"<div class='col-md-4 m-b-20px'>";
	
	echo"<div class='product-id display-none'>{$id}</div>";
	
	echo "<a href='product1.php ? pid={$id}' class='product-link'>";
	
	
	
	$product_image->pid=$id;
	$stmt_product_image=$product_image->readFirst();
	
	while($row_product_image=$stmt_product_image->fetch(PDO::FETCH_ASSOC)){
		echo"<div class='m-b-10px'>";
	echo"<img src='{$row_product_image['name']}' class='w-100-pct />";
			echo"</div>";
			
	}
	
	echo "<div class='product-name m-b-10px'><center>{$name}</center></div>";
        echo "</a>";
 
    
            echo "<div class='m-b-10px'>";
                echo "<center>&#8377;" . number_format($price, 2, '.', ',');
            echo "</center></div>";
 echo"</center>";
            echo "<div class='m-b-10px'>";
          
                $cart_item->u_id=1; 
                $cart_item->pid=$id;
 
                if($cart_item->exists()){
                    echo "<a href='cart.php' class='btn btn-success w-100-pct'>";
                        echo "Update Cart";
                    echo "</a>";
                }
				else{
                    echo "<a href='add_cart.php?id={$id}&page={$page}' class='btn btn-primary w-100-pct'>Add to Cart</a>";
                }
            echo "</div>";
 
 echo "</div>";
}
 echo "<center>";
include_once "paging.php";
 echo "</center>";
echo"</br></br></br>";
?>
	