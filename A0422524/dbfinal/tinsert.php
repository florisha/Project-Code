
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "u24";
	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="select * from CUSTOMER where _id='$_POST[customerid]'";

$result=$conn->query($sql);

if($result->num_rows>0)
{

$customerid = $_POST['customerid'];
$currentdate = date('Y-m-d');
  // echo $currentdate."<br>";
// $x=0;
$ITEM = "item";
$price = "price";
 //echo 'ITEM'.strval($x);
 $totalprice=0;
for($x=1;$_POST[$ITEM.strval($x)]!=null;$x++){
	// echo "<br>testing";
	$query1 = $_POST[$ITEM.strval($x)];
	$query2 = $_POST[$price.strval($x)];
	//echo "<br> Type of price is ".gettype($query2);
	$sql="select * from ITEM where _id=$query1";
	//echo "testing 2";
	$result = $conn->query($sql);
	if($result->num_rows>0){
		//echo "updating ITEM ";
		$sql = "update ITEM SET price=$query2 where _id=$query1";
		if ($conn->query($sql) === TRUE) {
			echo "price of ITEM is updated"."<br>";
		}
		else{
			echo "error in updating"."<br>";
		}
			
	}
	else{
		$sql="insert into ITEM(_id,price) values ($query1,$query2)";
		if ($conn->query($sql) === TRUE){
			echo "<br>new ITEM is inserted"."<br>";
		}
		else{
			echo "<br>error in inserting ITEM"."<br>";
			
		}
	}
		
	$totalprice=$totalprice+$query2;
}	
echo "total price ='$totalprice'"."<br>";
$sql="insert into TRANS(cid,totalPrice,tDate) values ($customerid,$totalprice,'$currentdate')";
// $result = $conn->query($sql);
$last_id=0;
if($conn->query($sql) == TRUE){
	echo "new transaction inserted"."<br>";
	$last_id = $conn->insert_id;
	echo "New record created successfully. Last inserted ID is: " . $last_id."<br>";
}
else{
	echo "error in insertion";
}


for($x=1;$_POST[$ITEM.strval($x)]!=null;$x++){
	$query1 = $_POST[$ITEM.strval($x)];
	//echo "<br>".gettype($query1);
	$sql="insert into TD (tid,iid) values($last_id,$query1)";
	if ($conn->query($sql) === TRUE){
		
		echo"Inserted into transaction details"."<br>";
	}

				


					

}

}//end of main

else {
	
	echo "ADD CUSTOMER";
}





$conn->close();


?>