<?php 
include 'sub/header.php';
 ?>
 <aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/person3.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
								<form action="addcustomer.php" method="POST" >
										<table align="center">
											<caption><h1>Customer Table</h1></caption>
											<tr>
												<th><label for="firstName" style="color:#000000">First Name:</label></th>
												<th><input type="text" name="first_name" id="first_name"   required></th>
											</tr>
											<tr>
												<th><label for="lastName" style="color:#000000">Last Name:</label></th>
												<th><input type="text" name="last_name" id="last_name" required></th>
											</tr>
											<tr>
												<th><label for="address" style="color:#000000">Address:</label></th>
												<th><input type="text" name="address" id="address" required></th>
											</tr>
											<tr>
												<th><label for="phoneNumber" style="color:#000000">Phone Number:</label></th>
												<th><input type="text" name="phoneNumber" id="phoneNumber" required></th>
											</tr>
											<tr>
												<th><input type="submit" style="color:#008000" value="Submit",method="post" ></th>
											</tr>
										</table>
									</form>
<?php 
include 'sub/footer.php';
 ?>

</html>
