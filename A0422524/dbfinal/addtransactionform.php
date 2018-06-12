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
								<form action="tinsert.php" method="post" >
										<table align="center" class="d">
										<col width="100">
										<caption style="color:#000000">Transaction Table</caption>
										<tr>
										<td ><label for="customerid" style="color:#000000">Customer's id:</label></td>
										<td><input type="text" name="customerid" id="customerid" required></td>
										</tr>
					
										<div id="dynamicInput">
										<tr>
										<td><label for="item" style="color:#000000">Item:</label></td>
										<td><input type="text" name="item1" id="item1" placeholder="Id"></td>
										<td><input type="text" name="price1" id="price1" placeholder="Price" required></td>
					
										<td><input id="btnAddValues" type="button" value="Add anotder text input" onClick="addInput('dynamicInput');"></td>
										</tr>
					
										<tr id="two" class="hide">
										<td><label for="item" style="color:#000000">Item:</label></td>
										<td><input type="text" name="item2" id="item" placeholder="Id"></td>
										<td><input type="text" name="price2" id="price" placeholder="Price"></td>
						
										</tr>
										<tr id="three" class="hide">
											<td><label for="item" style="color:#000000">Item:</label></td>
											<td><input type="text" name="item3" id="item" placeholder="Id"></td>
											<td><input type="text" name="price3" id="price" placeholder="Price" ></td>
											
										</tr>
										<tr id = "four" class="hide">
											<td><label for="item" style="color:#000000">Item:</label></td>
											<td><input type="text" name="item4" id="item" placeholder="Id"></td>
											<td><input type="text" name="price4" id="price" placeholder="Price"></td>
											
										</tr>
										<tr id = "five" class="hide">
											<td><label for="item" style="color:#000000">Item:</label></td>
											<td><input type="text" name="item5" id="item" placeholder="Id"></td>
											<td><input type="text" name="price5" id="price" placeholder="Price"></td>
											
										</tr>
										</div>
					
			
									<tr>
										<td><input type="submit" style="color:#008000" value="Submit" method="post"></td>
									</tr>
							</table>
						</form>
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
			<!-- if (counter == limit)  { -->
				<!-- alert("You have reached tde limit of adding " + counter + " inputs"); -->
			<!-- }	 -->
			<!-- else { -->
				<!-- <!-- var inner = document.getElementById(divName).innerHTML; --> -->
				<!-- alert(typeof document.getElementById(divName).innerHTML); -->
				<!-- document.getElementById(divName).innerHTML += document.getElementById(divName).innerHTML; -->
				<!-- <!-- echo(inner); --> -->
				<!-- <!-- var newdiv = document.createElement('div'); --> -->
				<!-- <!-- newdiv.innerHTML = "Entry " + (counter + 1) + " <td>"; --> -->
				<!-- <!-- document.getElementById(divName).appendChild(newdiv); --> -->
				<!-- counter++; -->
			<!-- } -->
		}
	</script>
</html>
