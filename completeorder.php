<?php
    include 'dbcon.php';
	$id=$_REQUEST['$id'];
	
	$update="UPDATE sales SET completed = TRUE WHERE sales_id='$id'";
	
	if(mysqli_query($conn, $update))
		{
		?>
			<script>
			alert("Order Completed");
			window.location = "admin.php";  
			</script>
		<?php
	}
?>