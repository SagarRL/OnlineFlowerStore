<?php
    $con= mysqli_connect("localhost", "root", "", "dbms");

    if (mysqli_connect_errno()) {
        echo "Failed to connect: " . mysqli_connect_error();
    }
	

?>