<?php
    include 'dbcon.php';
    if(isset($_POST["sign-in"])) {
		$uname=$_POST['username'];
    $pass=$_POST['password'];
		
		$sql = "SELECT * FROM admin WHERE username = '$uname' AND password = '$pass'";
		// $result = $conn->query($sql);
    $result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result)) {
         ?>
         <script>
           window.alert("Logged In Successfully");
           window.location = "admin.php";
         </script>
         <?php
      
    } else {  
      ?>
        <script>
          window.alert("Error: Incorrect Username or Password");
        </script>
      <?php
    }
}
?>