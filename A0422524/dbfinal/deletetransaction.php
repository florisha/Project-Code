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
							<form action="delete.php" method="delete" >
									<table align="center">
										<caption style="color:#000000">Transaction</caption>
										<tr>
											<th><label for="Transaction Number" style="color:#000000">Transaction Number:</label></th>
											<th><input type="number" name="trans_id" ="trans_id" style="color:#000000" required></th>
										</tr>
										
													<tr>
											<th><input type="submit" style="color:#008000" value="Submit"></th>
										</tr>
									
									</table>
								</form>
	<?php 
include 'sub/footer.php';
 ?>
</html>