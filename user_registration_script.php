<?php
    require 'connection.php';
    session_start();
    $name= mysqli_real_escape_string($con,$_POST['name']);
    $email=mysqli_real_escape_string($con,$_POST['email']);
    $regex_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email,$email)){
        echo "Incorrect email. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $password=md5(md5(mysqli_real_escape_string($con,$_POST['password'])));
    if(strlen($password)<6){
        echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
        ?>
        <meta http-equiv="refresh" content="2;url=signup.php" />
        <?php
    }
    $contact=$_POST['contact'];
    $slots = 20;
    $user_type = $_POST['user_type'];
    $city=mysqli_real_escape_string($con,$_POST['city']);
    $address=mysqli_real_escape_string($con,$_POST['address']);
    $duplicate_user_query="select id from users where email='$email'";
    $duplicate_user_result=mysqli_query($con,$duplicate_user_query) or die(mysqli_error($con));
    $rows_fetched=mysqli_num_rows($duplicate_user_result);

    $slots_query = mysqli_query($con, "select * from users where user_type = 1");
    $slots_count = mysqli_num_rows($slots);
    if($rows_fetched>0){
        //duplicate registration
        //header('location: signup.php');
        ?>
        <script>
            window.alert("Email already exists in our database!!");
        </script>
        <meta http-equiv="refresh" content="1;url=signup.php" />
        <?php
    }
    if($slots_count == $slots){
        ?>
        <script>
            window.alert("No more available slots, contact Admin!");
        </script>
        <meta http-equiv="refresh" content="1:url=signup.php">
        <?php
    }else{
        $user_registration_query="INSERT INTO users(name, email, password, contact, city, address, user_type) VALUES 
        ('$name', '$email', '$password', '$contact', '$city', '$address', '$user_type')";
        // die($user_registration_query);
        $user_registration_result=mysqli_query($con,$user_registration_query) or die(mysqli_error($con));
        echo "User successfully registered";
        $_SESSION['email']=$email;
        $_SESSION['user_type']=$type;
        //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
        $_SESSION['id']=mysqli_insert_id($con); 
        header('location: products.php');  //for redirecting
        ?>
        <meta http-equiv="refresh" content="3;url=login.php" />
        <?php
    }
    
?>