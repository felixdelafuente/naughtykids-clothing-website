<?php
		 include 'dbcon.php';

		$id=$_REQUEST['$id']; 
		
		$delete="DELETE FROM sales WHERE sales_id='$id'";
		
		if(mysqli_query($conn, $delete))
			{
	?>
		<script>
		alert("Order Deleted Successfully");
		window.location = "admin.php";  
		</script>
	<?php
	}
	?>