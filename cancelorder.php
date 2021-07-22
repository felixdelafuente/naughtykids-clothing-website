<?php
    include 'dbcon.php';
	$id=$_REQUEST['$id'];
	
	$update="UPDATE sales SET cancelled = TRUE WHERE sales_id='$id'";
	
	if(mysqli_query($conn, $update))
		{
		?>
			<script>
			alert("Order Has Been Cancelled");
			window.location = "admin.php";  
			</script>
		<?php
	}
?>