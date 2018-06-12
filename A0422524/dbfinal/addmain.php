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
								<h1>ADD NEW RECORDS</h1>
								<p>select the option to add new</p>
		   						<p align="center"><select style="width: 300px" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" >
									<option value=""  >Select...</option>
										<option value="addcustomerform.php">add customer</option>
										<option value="addarticleshtml.php">add article</option>
										<option value="addtransactionform.php">add transaction</option> 
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