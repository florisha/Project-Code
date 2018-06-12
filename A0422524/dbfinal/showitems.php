<?php include'sub/header.php';?>
<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center" style="color:#000000">
				<h2>Item Table</h2>
<?php

 


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "u24";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error)
		{
    die("Connection failed: " . $conn->connect_error);
		}
		
		
		$sql = "Select * from ITEM";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["_id"]. " price :" . $row["price"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?> 
					
				</div>
			</div>
		</div>
	</div>
<?php include "sub/footer.php";?>
</html>		
		
		
		
		
		
		
		








</body>
</html>



