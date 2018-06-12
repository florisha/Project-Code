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
		   						<form action="addarticles.php" method="post" >
			<table align="center" >
				<col width="100">
				<caption style="color:#000000">Article Table</caption>
					<tr>
						<td ><label for="title" style="color:#000000">Title:</label></td>
						<td><input type="text" name="title" id="title" required></td>
					</tr>
					<tr>
						<td ><label for="magazineid" style="color:#000000">Magazineid:</label></td>
						<td><input type="text" name="magid" id="magid" required></td>
					</tr>
					
					<tr>
						<td><label for="pages" style="color:#000000">Pages :</label></td>
						<td><input type="text" name="pages" id="pages" required></td>
					</tr>
					<tr>
						<td><label for="volumenumber" style="color:#000000">volume Number :</label></td>
						<td><input type="text" name="volumenumber" id="volumenumber" required></td>
					</tr>
					<tr>
						<td><label for="date" style="color:#000000">year</label></td>
						<td><input type="text" name="date" id="date" required></td>
					</tr>
					<div id="dynamicInput">
					<tr>
						<td><label for="author" style="color:#000000">Author:</label></td>
						<td><input type="text" name="author1" id="author1" placeholder="Author Name"></td>
						<td><input id="btnAddValues" type="button" value="Add anotder text input" onClick="addInput('dynamicInput');"></td>
					</tr>
					
					<tr id="two" class="hide">
						<td><label for="author" style="color:#000000">Author:</label></td>
						<td><input type="text" name="author2" id="author" placeholder="Author Name"></td>
						
					</tr>
					<tr id="three" class="hide">
						<td><label for="author" style="color:#000000">Author:</label></td>
						<td><input type="text" name="author3" id="author" placeholder="Author Name"></td>
						
					</tr>
					<tr id = "four" class="hide">
						<td><label for="author" style="color:#000000">Author:</label></td>
						<td><input type="text" name="author4" id="author" placeholder="Author Name"></td>
						
					</tr>
					<tr id = "five" class="hide">
						<td><label for="author" style="color:#000000">Author:</label></td>
						<td><input type="text" name="author5" id="author" placeholder="Author Name"></td>
						
					</tr>
					
					</div>
					
			
			
						<td><input type="submit" style="color:#008000" value="Submit"></td>
					</tr>
			</table>
		</form>
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
 ?>

	<script type="text/javascript" language="Javascript">
		var counter = 1;
		var limit = 5;
		function addInput(divName){
			console.log(counter);
			switch (counter){
				case 1:
					document.getElementById("two").classList.remove('hide');
					counter++;
					break;
				case 2:
					document.getElementById("three").classList.remove('hide');
					
					counter++;
					break;
				case 3:
					document.getElementById("four").classList.remove('hide');
					counter++;
					break;
				case 4:
					document.getElementById("five").classList.remove('hide');
					counter++;
					document.getElementById("btnAddValues").classList.add('hide');
					break;
				case 5:
					alert("You have reached tde limit of adding " + counter + " inputs");
					break;
			}
			
		}
	</script>
</html>
