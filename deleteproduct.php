<?php
		 include 'dbcon.php';

		$id=$_REQUEST['$id']; 
		
		$delete="DELETE FROM product WHERE product_id='$id'";
		
		if(mysqli_query($conn, $delete))
			{
	?>
		<script>
		alert("Product Deleted Successfully");
		window.location = "admin.php";  
		</script>
	<?php
	}
	?>