<?php
include 'dbcon.php';
if(isset($_POST['add-product'])) {
	$add_product_name = $_POST['add-product-name'];
	$add_product_price = $_POST['add-product-price'];
	$add_product_stock = $_POST['add-product-stock'];
    $add_product_img = $_FILES['file'];

	$img_name = $_FILES['file']['name'];
	$img_temp = $_FILES['file']['tmp_name'];
	$img_size = $_FILES['file']['size'];
	$img_error = $_FILES['file']['error'];
	$img_format = $_FILES['file']['type'];

	$img_ext = explode('.', $img_name);
	$img_actual_ext = strtolower(end($img_ext));

	$allowed = array('jpg', 'jpeg', 'png');

	$img_new = $img_name.'.'.$img_actual_ext;
	$img_path = 'uploads/'.$img_new;
	if(in_array($img_actual_ext, $allowed)) {
		if($img_error === 0) {
			if($img_size <= 100000) {
				move_uploaded_file($img_temp, $img_path);

				$insert="INSERT INTO product(product_name,product_image,product_price,product_stock)
				VALUES ('$add_product_name','$img_name','$add_product_price','$add_product_stock')";
				if(mysqli_query($conn, $insert)) {
					?>
					<script>
						window.alert("Product Added Successfully");
						window.location = "admin.php";  
					</script>
					<?php
				} else {
					?>
					<script>
						window.alert("Error: Unable to Add Product");
					</script>
					<?php
				}
			} else {
			?>
            	<script>
                window.alert("Error: Image File is too Big");
            	</script>
        	<?php
			}
		} else {
		?>
            <script>
                window.alert("Error: Unable to Upload Image");
            </script>
        <?php
		}
	} else {
		?>
            <script>
                window.alert("Error: Invalid Image Format");
            </script>
        <?php
	}

	
	
	}
?>