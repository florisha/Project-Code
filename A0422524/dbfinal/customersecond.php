<?php include'sub/header.php';?>
<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center" style="color:#000000">
				<?php 
				$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "u24";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		
	} 
				SESSION_START();
				
				
				
				$sql="insert into CUSTOMER(fname,lname,address,phonenumber) values ('$_SESSION[fname]','$_SESSION[lname]','$_SESSION[addr]','$_SESSION[pno]')";
	 
	 
					 if ($conn->query($sql) === TRUE){
						 
				//		  echo "CUSTOMER inserted";
						   $newcust_id = $conn->insert_id;
					echo "New record created successfully. Last inserted ID is: " . $newcust_id;
						  
						  
					 }
					 else{
						 
						 echo "Error in inserting CUSTOMER";
						 
					 }
					 session_destroy();
				?>
				</div>
			</div>
		</div>
	</div>
<?php include "sub/footer.php";?>
</html>			
 