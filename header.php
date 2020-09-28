<?php
  require 'connection.php';
?>
<nav class="navbar navbar-inverse navabar-fixed-top">
   <div class="container">
       <div class="navbar-header">
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
           </button>
           <a href="index.php" class="navbar-brand">Kasu Vendors</a>
       </div>
       
       <div class="collapse navbar-collapse" id="myNavbar">
           <ul class="nav navbar-nav navbar-right">
               <?php
               if(isset($_SESSION['email'])){
                  $user = $_SESSION['email'];
                  $select_id = "SELECT * FROM users WHERE email='$user'";
                  $query = mysqli_query($con, $select_id);
                  $row = mysqli_fetch_assoc($query);
                  $user_id = $row['id'];
               ?>
               <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
               <li><a href="settings.php"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
               <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               <?php
               }else{
                ?>
                <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
               <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
               <?php
               }
               ?>
               
           </ul>
       </div>
   </div>
</nav>