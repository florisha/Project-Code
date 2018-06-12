
						<?php

						$servername = "localhost";
							$username = "root";
							$password = "root";
							$dbname = "u24";
							$conn = new mysqli($servername, $username, $password, $dbname);
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
						}
						//echo "test";
						// Check if MAGAZINE id exists
						$sql = "select * from MAGAZINE where _id = $_POST[magid]";
					//	echo "helloo";
						$result = $conn->query($sql);
						//echo "$result";
						if($result->num_rows == 0){
							echo "MAGAZINE id entered is invalid. Please try again";
							exit();
						}

						// Check if volume exists for the given MAGAZINE id 
						$sql ="select vno, mvid from volume, contain where contain.mid ='$_POST[magid]'";
						$result = $conn->query($sql);
						$isin = 0;
						$mvid = 0;
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								// echo "volume id: " . $row["vno"].  "<br>";
								if($row["vno"] == $_POST['volumenumber']){
									$isin = 1;
									$mvid = $row["mvid"];
									break;
								}
							}
						}

						// If volume id does not exist, insert volume and contain
						if($isin==0){
							$sql1 = "insert into volume (vno,date) VALUES('$_POST[volumenumber]','$_POST[date]')";

							if ($conn->query($sql1) === TRUE) {
								$volumeid = $conn->insert_id;
								
							echo "New record created successfully. new volume inserted ID is: " . $volumeid."<br>";
							//	echo "$volumeid";
								$mvid = $volumeid;
							//	echo "mvid";
								$sql2="insert into contain (mvid,mid) Values($mvid,'$_POST[magid]')";
								if ($conn->query($sql2) === TRUE){

									echo "<br>inserted into contain ";
								//$contain = $conn->insert_id;
							//	echo "New record created successfully. Last contain ID is: " . $contain;				
								}
								else{
									echo "error";
								}
							}

							else {
							echo "Error: " . $sql1 . "<br>" . $conn->error;
							}
						}


						$sql = "select title from articles where title='$_POST[title]'";
						$result = $conn->query($sql);
						$artisin = 0;
						$artid = 0;
						if($result->num_rows>0){
							echo "<br>Article already exists";
							$artisin = 1;
						}
						else{
							$sql = "insert into articles(title,pgno,mvid) values ('$_POST[title]','$_POST[pages]','$mvid')";
							if ($conn->query($sql) == TRUE) {
								echo "<br>New Article created";
								$artid = $conn->insert_id;
								
							echo "New record created successfully. new Article ID is: " . $artid;
							} 
							else {
								echo "Error: " . $sql . "<br>" . $conn->error;
							}
						}


						$AUTHOR = "author";
						if($artisin == 0){
							for($x=1;$_POST[$AUTHOR.strval($x)]!=null;$x++){
								echo "<br/>".$_POST[$AUTHOR.strval($x)];
								$pieces = explode(' ', $_POST[$AUTHOR.strval($x)]);
								$last_word = array_pop($pieces);
								$first_word = "";
								foreach($pieces as $row){
									$first_word = $first_word." ".$row;
								}
								if ($first_word==""){
									$first_word=$last_word;
									$last_word="";
									$email = $first_word."@gmail.com";
								}
								else{
									$first_word = substr($first_word,1);
									$email = $first_word.".".$last_word."@gmail.com";
								}
								
								$sql = "select * from AUTHOR where (fname='$first_word' AND lname='$last_word')";
								$result = $conn->query($sql);
								if($result->num_rows==0){
									$sql = "insert into AUTHOR(email,fname,lname) values ('$email','$first_word','$last_word')";
									if ($conn->query($sql) == TRUE) {
										echo "<br>New AUTHOR created successfully";
										$authid = $conn->insert_id;
										
										$sql = "insert into article_author(auth_id,art_id) values ('$authid','$artid')";
										if($conn->query($sql)==TRUE){
											echo "<br>New Article_Author entry created";
											$newauthor = $conn->insert_id;
							echo "New record created successfully. new AUTHOR inserted ID is: " . $authid."<br>";
										}
									} 
									else {
										echo "Error: " . $sql . "<br>" . $conn->error;
									}
								
								}
							}
						}
						$conn->close();
						