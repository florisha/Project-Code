<?php include 'sub/header.php';?>
	<div id="fh5co-services" class="fh5co-bg-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 text-center" style="color:#000000">
				
					<?php
					$x = $_GET['trans_id'];


					if ($x == null) {
						
						echo "enter values";
					}

					else {
						
						$servername = "localhost";
						$username   = "root";
						$password   = "root";
						$dbname     = "u24";
						
						
						$conn = new mysqli($servername, $username, $password, $dbname);
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}
						
						
						
						else {
							
							$sql2 = "select tdate from TRANS where _id={$x}";
							$res  = $conn->query($sql2);
							if ($res->num_rows > 0) {
							   while($row = $res->fetch_assoc()) {
								   if (date('Y-m-d', strtotime('-30 days')) <$row["tdate"]) {
									
									$sql1 = "Delete from  u24.td where tid={$x}";
									
									
									if ($conn->query($sql1) === TRUE) {
										$sql = "Delete from  u24.TRANS where _id={$x}";
										if ($conn->query($sql) === TRUE) {
											echo " record deleted successfully";
										} else {
											echo "Error: " . $sql . "<br>" . $conn->error;
										}
									} else {
										//echo "error";
									}
									
									
								} else {
									echo 'Transaction in out of date"';
							} 
							}
							} else {
								echo "no  Tansaction with this Transaction Number";
							}
						}
						
						$conn->close();
					}

					?>
					
				</div>
			</div>
		</div>
	</div>

<?php include 'sub/footer.php'?>
	</html>
