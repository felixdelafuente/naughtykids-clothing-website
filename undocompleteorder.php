<?php
    include 'dbcon.php';
	$id=$_REQUEST['$id'];
	
	$update="UPDATE sales SET completed = FALSE WHERE sales_id='$id'";
	
	if(mysqli_query($conn, $update))
		{
		?>
			<script>
			alert("Reverted Order to Ongoing Status");
			window.location = "admin.php";  
			</script>
		<?php
	}
?>