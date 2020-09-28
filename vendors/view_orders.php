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
              <?php
                if(isset($_SESSION['email'])) {
                  $user = $_SESSION['email'];
                  // echo $user;
                  $select_user_id = "SELECT * FROM users WHERE email='$user'";
                  $select_id_result = mysqli_query($con, $select_user_id);
                  $result_array = mysqli_fetch_assoc($select_id_result);

                  $user_id = $result_array['id'];
                  $user_type = $result_array['user_type'];
                }
                 else{
                  die('You are not allowed to view this page');
                }
              ?>
              
              
              <?php
                $select_user_product = "SELECT * FROM users_items WHERE vendor_id='$user_id'";
                $result = mysqli_query($con, $select_user_product);

                ?>
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
                            <h2 class="card-title">My Orders</h2>
                          </div>
                          <div class="card-body">
                            <?php
                                if(isset($_GET['delete'])) {
                                  $id = $_GET['delete'];
                                  $qry = "DELETE FROM items WHERE id='$id'";
                                  $delete = mysqli_query($con, $qry);
                                  if($delete) {
                                    ?><div class='alert alert-danger'>Product Deleted!</div>
                                    <meta http-equiv="refresh" content="2;url=dashboard.php" />
                                  <?php }
                                }
                            ?>

                            <table class="table mb-0">
                              <thead class="bg-light">
                                <tr>
                                  <th scope="col" class="border-0">#</th>
                                  <th scope="col" class="border-0">User</th>
                                  <th scope="col" class="border-0">Item</th>
                                  <th scope="col" class="border-0">Image</th>
                                  <th scope="col" class="border-0">Status</th>
                                  <th scope="col" class="border-0">Delete</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                $i = 1;
                                $result_row = mysqli_num_rows($result);
                                if($result_row > 0) {
                                  while($row = mysqli_fetch_assoc($result)) {
                                    $form_user = $row['user_id'];
                                    $product = $row['item_id'];
                                ?>
                                <tr>
                                  <td><?php echo $i++;?></td>
                                  <?php
                                  //fetch user
                                  $fetch_user = "SELECT * FROM users WHERE id='$form_user'";
                                  $query = mysqli_query($con, $fetch_user);
                                  $fetch_array = mysqli_fetch_assoc($query);
                                  ?> 
                                  <td><?php echo $fetch_array['name'];?></td>
                                  <?php
                                  //fetch product
                                  $fetch_product = "SELECT * FROM items WHERE id='$product'";
                                  $product_query = mysqli_query($con, $fetch_product);
                                  $product_array = mysqli_fetch_assoc($product_query);
                                  ?>
                                  <td><?php echo $product_array['name'];?></td>
                                  <td><img src="../img/<?php echo $product_array['image'];?>" alt="Cannon" width="50" height="50"></td>
                                  <td><?php echo $row['status'];?></td>
                                  <td><a href="dashboard.php?delete=<?php echo $row['id'];?>" class="btn btn-block btn-danger" name="add">Delete</a></td>
                                </tr>
                              <?php }}
                                else {
                                  echo "<div class='alert alert-danger text-center'>You have not added any product yet</div>";
                                }
                              ?>
                              </tbody>
                            </table>
                            
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