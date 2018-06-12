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
// if(issset($_POST['first_name'])){
	// header('location: customersecond.php?name=')
// }

/*function insert($conn){
	$sql = "Insert into CUSTOMER ( fname,lname,address,phonenumber)
		VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[address]','$_POST[phoneNumber]')";

			if ($conn->query($sql) == TRUE) {
				echo "New record created successfully";
				} 
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			}
*/

session_start();
		$_SESSION['fname']="$_POST[first_name]";
		$_SESSION['lname']="$_POST[last_name]";
		$_SESSION['addr']="$_POST[address]";
		$_SESSION['pno']="$_POST[phoneNumber]";
		
	
	

	$sql="select * from  u24.CUSTOMER where fname='$_POST[first_name]' and lname='$_POST[last_name]' and address='$_POST[address]' and phonenumber='$_POST[phoneNumber]'";

	$result = $conn->query($sql);


	
	if ($result->num_rows> 0)  
	{
		echo "CUSTOMER already exist";
	}

 

	else{
	$sql="select * from  u24.CUSTOMER where fname='$_POST[first_name]' and lname='$_POST[last_name]'";
	
	$result = $conn->query($sql);


	// echo "$result";
	if ($result->num_rows> 0)  
	{
		echo "CUSTOMER with same already exist ";
		echo "do you still want to continue";
		?><form action="customersecond.php" method="POST" >
										<table align="center">
											
											<tr>
												<td><input type="submit" style="color:#008000" value="YES",method="post" ></td>
											</tr>
										</table>
									</form>
									<br>
									<form action="addcustomerform.php"><br>
										<table align="center">
											
											<tr>
												<td><input type="submit" style="color:#8B0000" value="NO"></td>
											</tr>
										</table>
									</form>
								<?php

	//	<form action ="update.php" method ="POST"><a href="update.php">yes</a></form>
	//	<form action ="addcustomer.html" method="POST"><a href="addcustomer.html">no</a></form>
	}
		

else{	 
 
	 $sql="insert into CUSTOMER(fname,lname,address,phonenumber) values ('$_POST[first_name]','$_POST[last_name]','$_POST[address]','$_POST[phoneNumber]')";
	 
	 
	 if ($conn->query($sql) === TRUE){
		 
//		  echo "CUSTOMER inserted";
		   $newcust_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $newcust_id;
		  
		  
	 }
	 else{
		 
		 echo "Error in inserting CUSTOMER";
		 
	 }
	 
	 
	 
	 
	
}
	}
$conn->close();

?>	
	
				</div>
			</div>
		</div>
	</div>
<?php include "sub/footer.php";?>
</html>			
 