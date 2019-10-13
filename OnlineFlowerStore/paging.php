<?php
include_once 'dbconnection.php';
echo "<div class='col-md-12'>";
echo"<ul class'pagination m-b-20px m-t-0px'>";

if ($page>1){
	echo"<a href='{$page_url}' title='Go to the first page.'>";
	echo "First Page";
	echo "</a>";
	
}

$total_pages=ceil($total_rows / $records_per_page);

$range=2;



$initial_num = $page - $range;
$condition_limit_num = ($page+$range) + 1;
for($x=$initial_num;$x <= $total_pages;$x++)
{
	
if (($x > 0) && ($x <= $total_pages)) {
 
            // current page
            if ($x == $page) {
                echo "--<a href=\"#\">$x <span class=\"sr-only\">(current)</span></a>";
            }
 
            // not current page
            else {
                echo "--<a href='{$page_url}page=$x'>$x</a>";
            }
        }
    }
 
    // button for last page
    if($page<$total_pages){
        
            echo "--<a href='" . $page_url . "page={$total_pages}' title='Last page is {$total_pages}.'>";
                echo "Last Page";
            echo "</a>";
        
    }
 
   
echo "</div>";
?>