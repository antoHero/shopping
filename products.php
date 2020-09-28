<?php
    session_start();
    require 'check_if_added.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Projectworlds Store</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css">
    </head>
    <body>
        <div>
            <?php
                require 'header.php';
            ?>
            <div class="container">
                <div class="jumbotron text-center">
                    <h1>Welcome to Kasu Vendors!</h1>
                    <p>Shop here without leaving your department.</p>
                </div>
                <?php
                if(isset($_SESSION['email'])) {
                    
                }
                ?>
            </div>
            <div class="container">
                <div class="row">
                    <?php 

                        // $user = $_SESSION['id'];
                        $select_products = "SELECT * FROM items ORDER BY id DESC";
                        $select_products_query = mysqli_query($con, $select_products);
                        if(mysqli_num_rows($select_products_query) > 0) {
                            while($row = mysqli_fetch_assoc($select_products_query)) {
                                $id = $row['id'];
                                $name = $row['name'];
                                $price = $row['price'];
                                $vendor = $row['user_id'];
                                $image = $row['image'];
                            

                    ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="thumbnail">
                            <a href="cart.php">
                                <img src="img/<?php echo $image;?>" alt="Cannon">
                            </a>
                            <center>
                                <?php
                                    //get vendor
                                    $get_vendor = "SELECT * FROM users WHERE id='$vendor'";
                                    $run_query = mysqli_query($con, $get_vendor);
                                    $assoc = mysqli_fetch_assoc($run_query);
                                    $name_of_vendor = $assoc['name'];
                                ?>
                                <div class="caption">
                                    <h3><?php echo $name?></h3>
                                    <p>Price: NGN. <?php echo $price?></p>
                                    <p>Sold by: <?php echo $name_of_vendor;?></p>
                                    <?php if(!isset($_SESSION['email'])){  ?>
                                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                                        <?php
                                        }
                                        else{
                                            if(check_if_added_to_cart(1)){
                                                echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                                            }else{
                                                ?>
                                                <a href="cart_add.php?id=<?php echo $row['id'];?>&vendor=<?php echo $vendor;?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                                                <?php
                                            }
                                        }
                                        ?>
                                    
                                </div>
                            </center>
                        </div>
                    </div>
                        <?php
                            }
                        } else {
                            echo "<div class='alert alert-info'>No Products yet!</div>";
                        }
                        ?>
                </div>
            </div>
            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
                <center>
                   <p>Copyright &copy <a href="https://projectworlds.in">Projectworlds</a> Store. All Rights Reserved.</p>
                   <p>This website is developed by Yugesh Verma</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>
