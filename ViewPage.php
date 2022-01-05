<!DOCTYPE html>
<html lang="En">

<!--Meal Planning-->
	<head>
		<link rel="stylesheet" href="Generic.css">
		<title>The Hive</title>
	</head>
	<body>
		<?php
			session_start();
			include 'NavBar.php'
		?>
		<div class="header">
			<h1><u>View Your Hive</u></h1>
		</div>
		<!-- Tab links -->
		<div class="tab">
			<button class="tablinks" onclick="openCity(event, 'VEI')">View/Edit Ingredients</button>
			<button class="tablinks" onclick="openCity(event, 'VEM')">View/Edit Meals</button>
			<button class="tablinks" onclick="openCity(event, 'VMP')">View your Meal Plans</button>
			<button class="tablinks" onclick="openCity(event, 'VR')">View your Meal Plan Rules</button>
		</div>

		<!-- Tab contents -->
		<div id="VEI" class="tabcontent">
			<ul class="scrollable">
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
			</ul>
			<div class="tab-child">
			<h2>Edit your Ingredients</h2>
			<label>Name: <input type = "text" size = "25"/></label><br>
			<label>Cost: <input type = "text" size = "25"/></label>
			<p>Type of Ingredient:</p>
			<label class="RadioContainer">Meat
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Carbohydrates
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Dairy
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Fruit
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Vegitable
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			</div>
		</div>
		
		<div id="VEM" class="tabcontent">
			<ul class="scrollable">
				<li>Test1</li>
				<li>Test2</li>
				<li>Test3</li>
				<li>Test4</li>
				<li>Test5</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
			</ul>
			<div class="tab-child">
			<h2>Edit your Meals</h2>
			<label>Name: <input type = "text" size = "25"/></label><br>
			<label>Cost: <input type = "text" size = "25"/></label>
			<p>Type of Ingredient:</p>
			<label class="RadioContainer">Meat
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Carbohydrates
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Dairy
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Fruit
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			<label class="RadioContainer">Vegitable
				<input type="radio" name="ingType">
				<span class="radio"></span>
			</label>
			
			</div>
		</div>
		
		<div id="VMP" class="tabcontent">
			<table id="highlightingGrid">
				<tr>
					<td></td>
					<th>Monday</th>
					<th>Tuesday</th>
					<th>Wednesday</th>
					<th>Thursday</th>
					<th>Friday</th>
					<th>Saturday</th>
					<th>Sunday</th>
				</tr>
				<tr>
					<th>Breakfast</th>
					<td>Test 1</td>
					<td>Test 2</td>
					<td>Test 3</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>Lunch</th>
					<td>Test 4</td>
					<td>Test 5</td>
					<td>Test 6</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>Snack</th>
					<td>Test 7</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th>Dinner</th>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div class="content-child" style="width: 48%;">
				<label for="rules">Choose a mealplan:</label>
				<select name="rules" id="rules">
				  <option value="volvo">Mealplan 1</option>
				  <option value="saab">Mealplan 2</option>
				  <option value="mercedes">Mealplan 3</option>
				  <option value="audi">Mealplan 4</option>
				</select>
				<br><br>
				<fieldset>
					<legend>Select a meal to see it's ingrediants and recipe </legend>
					<label>Meal Name: <input type = "text" id = "gridReturn" size = "25"/></label>
				</fieldset>
			</div>
			<input type="button" value="Edit this Meal Plan"/>
			<input type="button" value="Print this Meal Plan"/>
		</div>
		
		<div id="VR" class="tabcontent">
			<h2>Edit your Meal Plan Rules</h2>
			<ul class="scrollable" style="width: 20%;">
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
				<li>Test</li>
			</ul>
			<table class="tab-child" style="width: 39%;">
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<th></th>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
				</tr>
				<tr>
					<th></th>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
					<td>
					<label class="CheckContainer">
						<input type="checkbox" checked="checked">
						<span class="checkmark"></span>
					</label>
					</td>
				</tr>
			</table>
			<div class="tab-child" style="width: 39%;">
				<fieldset>
					<legend>Select a ruleset to view and edit it's rules</legend>
					<label>Ruleset Name: <input type = "text" size = "25"/></label>
				</fieldset>
			</div>
		</div>
		<script src="Generic.js"></script>
		<script>
		function openCity(evt, cityName) {
		  var i, tabcontent, tablinks;
		  tabcontent = document.getElementsByClassName("tabcontent");
		  for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		  }
		  tablinks = document.getElementsByClassName("tablinks");
		  for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		  }
		  document.getElementById(cityName).style.display = "block";
		  evt.currentTarget.className += " active";
		}
		</script>
	</body>
</html>