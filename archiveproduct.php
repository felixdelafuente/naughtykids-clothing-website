<?php
    include 'dbcon.php';
	$id=$_REQUEST['$id'];
	
	$update="UPDATE product SET product_stock = FALSE WHERE product_id='$id'";
	
	if(mysqli_query($conn, $update))
		{
		?>
			<script>
			alert("Product Archived Successfully");
			window.location = "admin.php";  
			</script>
		<?php
	}
?>