<?php
    include 'dbcon.php';
	$id=$_REQUEST['$id'];
	
	$update="UPDATE product SET product_stock = TRUE WHERE product_id='$id'";
	
	if(mysqli_query($conn, $update))
		{
		?>
			<script>
			alert("Product is Now Available");
			window.location = "admin.php";  
			</script>
		<?php
	}
?>