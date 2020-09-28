<?php
    require 'connection.php';
    // require 'header.php';
    session_start();
    $item_id=$_GET['id'];
    $vendor=$_GET['vendor'];

    // die($vendor);
    $user_id=$_SESSION['id'];
    // var_dump($user_id);
    $add_to_cart_query="INSERT INTO users_items(user_id,item_id,status,vendor_id) VALUES ('$user_id','$item_id','Added to cart','$vendor')";
    $add_to_cart_result=mysqli_query($con,$add_to_cart_query) or die(mysqli_error($con));
    if($add_to_cart_result) {
        echo "<div class='alert alert-success text-center'>Item added to cart</div>";
    
        echo "<meta http-equiv='refresh' content='2;url=products.php' />";
    
    
    }
?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">