<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>Kasu Vendors</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="../css/style.css" type="text/css">
    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           
           <div class="container" style="margin-top: 10px;">
              <div class="row" style="margin-top: 10px;">
                <div class="col-md-3 col-sm-6">
                  <div class="card">
                    <div class="card-header">
                      <h2 class="card-title">Dashboard</h2>
                    </div>
                    <div class="card-body">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="dashboard.php">Home</a></li>
                        <li class="list-group-item"><a href="add_product.php">Add Product</a></li>
                        <li class="list-group-item"><a href="view_orders.php">Orders</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-header">
                      <h2 class="card-title">Add Product</h2>
                    </div>
                    <div class="card-body">
                        <div class="justify-content-center">
                          <form method="post" action="add_product_script.php" enctype="multipart/form-data">
                              <div class="form-group">
                                  <input type="text" class="form-control" name="name" placeholder="Name" required="true">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" name="price" placeholder="Price" required="true">
                              </div> 
                              <div class="form-group">
                                  <input type="file" name="image" required="true">
                              </div>
                              <div class="form-group">
                                  <input type="submit" class="btn btn-primary" value="Add">
                              </div>
                          </form>
                        </div>
                    </div>
                  </div>
                  
              </div>    
                      
            </div>
           </div>
            <br><br> <br><br><br><br>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>Copyright &copy <a href="../index.php">Kasu Vendors</a> Store. All Rights Reserved.</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>