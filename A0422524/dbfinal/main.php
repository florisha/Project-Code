<?php 
include 'sub/header.php';
 ?>
	
	<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">
		   	<li style="background-image: url(images/fatheroflibrary.jpg);">
		   		<div class="overlay-gradient"></div>
		   		<div class="container">
		   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
		   				<div class="slider-text-inner">
		   					<div class="desc">
								<h1>Select any table</h1>
		   						<p align="center"><select style="width: 300px" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" >
									<option value=""  >Select...</option>

										<option value="articles.php">Articles</option>
										<option value="showmagazine.php">Magazine</option>
										<option value="showauthor.php">Author</option>
										<option value="showcustomer.php">Customer</option>
										<option value="showtransaction.php">Transaction</option>
										<option value="showitems.php">Items</option>
										<option value="showtransactiondetail.php">Transaction Details</option>
										<option value="showarticleauthor.php">Article Author</option>
										<option value="showcontain.php">Magazine and Volume </option>
										<option value="showvolume.php">Volume</option>
								</select> </p>
		   					</div>
		   				</div>
		   			</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	

	<?php 
include 'sub/footer.php';
 ?></html>