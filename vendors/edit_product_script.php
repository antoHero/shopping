<?php
	require '../connection.php';
	session_start();

	if(isset($_SESSION['email'])) {
      $user = $_SESSION['email'];
      // echo $user;
      $select_user_id = "SELECT * FROM users WHERE email='$user'";
      $select_id_result = mysqli_query($con, $select_user_id);
      $result_array = mysqli_fetch_assoc($select_id_result);

      $user_id = $result_array['id'];
    } else{
      die('You are not allowed to view this page');
    }
    if(isset($_GET['edit'])) {
      $product_id = $_GET['edit'];
      die($product_id);
    }

    $select_product_id = "SELECT * FROM items WHERE id='$product_id'";
    $select_result = mysqli_query($con, $select_product_id);
    while($row = mysqli_fetch_assoc($select_result)) {
      $id = $row['id'];
      $product_name = $row['name'];
      $product_price = $row['price'];
      $product_image = $row['image'];
    }

	$name = mysqli_real_escape_string($con, $_POST['name']);
	$price = mysqli_real_escape_string($con, $_POST['price']);

	$image = $_FILES['image']['name'];
	$image_size = $_FILES['image']['size'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$image_type = $_FILES['image']['type'];
	$image_ext = strtolower(end(explode('.', $image)));
	$extensions = array("jpeg", "jpg", "png");

	if(in_array($image_ext, $extensions) === false) {
		echo "<p class='alert alert-danger'>Image extension not allowed.</p>";
	}

	if($image_size > 2097152) {
		echo "<p class='alert alert-danger'>Image larger than 2MB</p>";
	} else {
		move_uploaded_file($image_tmp, '../img/'.$image);
		$add_query = "UPDATE items SET name='$name', price='$price', image='$image' WHERE id='$product_id'";
		$add_result = mysqli_query($con, $add_query);
		if($add_result) {
			echo "<div class='alert alert-success'>Product Updated!</div>";
			?>
			<meta http-equiv="refresh" content="2;url=dashboard.php" />
			<?php
		} else {
			echo "<div class='alert alert-danger'>An Error Occurred! </div>" . mysqli_error($con);
		}
	}

?>