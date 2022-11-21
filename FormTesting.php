<!DOCTYPE html>
<!-- Temp. Forms-->
<html lang="en">
	<head>
		<link rel="stylesheet" href="Generic.css">
		<title>Form Testing</title>
		<style>
		.content-child {
			border-style: dotted;
			border-color: var(--colorMid);
			padding: 5px;
			margin-bottom: 10px;
		}
		</style>
	</head>
	<body>
		<?php
			require_once 'Forms.php';
		?>
		<div class="header">
			<h1><u>Form Testing</u></h1>
		</div>
		<div class = "content">
			<form class = "content-child" id = "newIngredients" action=FormTesting.php method="post">
				<input type="hidden" name="formId" value="Ingredients">
				<h2>New Ingredient</h2>
				<span class="error"><?php echo $ingErr;?></span><br>
				<label>Item name: <input type = "text" name = "itemName" size = "25"/></label><br>
				<label>(appx.) Price: <input type = "text" name = "price" size = "25"/></label><br>
				<label class="CheckContainer">Currently In My Pantry
					<input type="checkbox" checked="checked" name="InPantry">
					<span class="checkmark"></span>
				</label>
				<label class="RadioContainer">Meat
					<input type="radio" name="radio" value="meat">
					<span class="radio"></span>
				</label>
				<label class="RadioContainer">Carbohydrates
					<input type="radio" name="radio" value="carbs">
					<span class="radio"></span>
				</label>
				<label class="RadioContainer">Dairy
					<input type="radio" name="radio" value="dairy">
					<span class="radio"></span>
				</label>
				<label class="RadioContainer">Fruit
					<input type="radio" name="radio" value="fruit">
					<span class="radio"></span>
				</label>
				<label class="RadioContainer">Vegitables
					<input type="radio" name="radio" value="veg">
					<span class="radio"></span>
				</label>
				<label class="RadioContainer">Spice/Condiment
					<input type="radio" name="radio" value="other">
					<span class="radio"></span>
				</label>
				
				<input type="submit">
			</form>
			<form class = "content-child" id = "newMealPlan" action=FormTesting.php method="post">
				<h2>New MealPlan</h2>
				<input type="hidden" name="formId" value="NewMealPlan">
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
						<?php
						if(isset($_POST["formId"]))
						{
							for($i = 0; $i < 7; $i++)
							{
								$sql = "SELECT Name FROM meals WHERE UserId = $ID AND MealType = 'breakfast' ORDER BY RAND() LIMIT 1";
								$result = $link->query($sql);
								
								if ($result->num_rows > 0) 
								{
								  while($row = $result->fetch_assoc()) 
								  {
									echo "<td>".$row["Name"]."</td>";
								  }
								}
								else
									{echo "<td></td>";}
							}
						}
						else
							echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
						?>
					</tr>
					<tr>
						<th>Lunch</th>
						<?php
						if(isset($_POST["formId"]))
						{
							for($i = 0; $i < 7; $i++)
							{
								$sql = "SELECT Name FROM meals WHERE UserId = $ID AND MealType = 'lunch' ORDER BY RAND() LIMIT 1";
								$result = $link->query($sql);
								
								if ($result->num_rows > 0) 
								{
								  while($row = $result->fetch_assoc()) 
								  {
									echo "<td>".$row["Name"]."</td>";
								  }
								}
		
								else
									echo "<td></td>";
							}
						}
						else
							echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
						?>
					</tr>
					<tr>
						<th>Snack</th>
						<?php
						if(isset($_POST["formId"]))
						{
							for($i = 0; $i < 7; $i++)
							{
								$sql = "SELECT Name FROM meals WHERE UserId = $ID AND MealType = 'snack' ORDER BY RAND() LIMIT 1";
								$result = $link->query($sql);
								
								if ($result->num_rows > 0) 
								{
								  while($row = $result->fetch_assoc()) 
								  {
									echo "<td>".$row["Name"]."</td>";
								  }
								}
		
								else
									echo "<td></td>";
							}
						}
						else
							echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
						?>
					</tr>
					<tr>
						<th>Dinner</th>
						<?php
						if(isset($_POST["formId"]))
						{
							for($i = 0; $i < 7; $i++)
							{
								$sql = "SELECT Name FROM meals WHERE UserId = $ID AND MealType = 'dinner' ORDER BY RAND() LIMIT 1";
								$result = $link->query($sql);
								
								if ($result->num_rows > 0) 
								{
								  while($row = $result->fetch_assoc()) 
								  {
									echo "<td>".$row["Name"]."</td>";
								  }
								}
		
								else
									echo "<td></td>";
							}
						}
						else
							echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
						?>
					</tr>
				</table>
				<input type="submit" value="Generate a Meal Plan">
				<input type="button" value="Save a Meal Plan">
				<input type="button" value="Print">
				
			</form>
			<form class = "content-child" id = "newMeal" action=FormTesting.php method="post">
				<h2>New Meal</h2>
				<input type="hidden" name="formId" value="NewMeal">
				<span class="error"><?php echo $mealErr;?></span><br>
				<label>Meal name: <input type = "text" name = "mealName" size = "25"/></label><br>
				<label for="MealType2">Type of Meal:</label>
				<select name="mealType" id="MealType2">
					<option value="breakfast">Breakfast</option>
					<option value="lunch">Lunch</option>
					<option value="dinner">Dinner</option>
					<option value="snack">Snack</option>
					<option value="desert">Desert</option>
				</select><br>
				<label>Calories: <input type = "text" name = "calories" size = "25"/></label><br>
				<label class="CheckContainer">Easy Prep
					<input type="checkbox" checked="checked" name="easyPrep">
					<span class="checkmark"></span>
				</label>
				<p>Ingredients: </p><div style="overflow-y: scroll; margin-left: 15px; max-height: 200px;">
					<?php
						$sql = "SELECT Name, id FROM ingredients WHERE UserID = $ID";
						$result = $link->query($sql);
						
						if($result !== false)
						{
						if ($result->num_rows > 0) {
						  while($row = $result->fetch_assoc()) {
							echo "<label class=\"CheckContainer\">".$row["Name"]."<input type=\"checkbox\" name=\"ingredients_list[]\" value=".$row["id"]."><span class=\"checkmark\"></span></label>";
						  }
						}
						}
					?>
				</div> 
				<p>Recipe: </p>
				<textarea name = "recipe"></textarea><br>
				<input type="submit">
			</form>
			<div class = "content-child" id="ingredients">
				<h2>Your Pantry</h2>
				<dl id="ingList">
					<?php
						$sql = "SELECT id, Name, Cost FROM ingredients WHERE InPantry='1' AND UserID = $ID";
						$result = $link->query($sql);

						if($result !== false)
						{
						if ($result->num_rows > 0) {
						  while($row = $result->fetch_assoc()) {
							echo "<dt>".$row["Name"]."</dt>";
							echo "<dd>$".$row["Cost"]."</dd>";
						  }
						}} else {
						  echo "0 results";
						}
					?>
				</dl>
			</div>
			<div class = "content-child" id="meals">
				<h2>All Meals</h2>
				<dl id="mealList">
					<?php
						$sql = "SELECT Name, id FROM meals WHERE UserID = $ID";
						$result = $link->query($sql);

						if($result !== false)
						{
							if ($result->num_rows > 0) {
							  while($row = $result->fetch_assoc()) {
								echo "<dt>".$row["Name"]."</dt>";
								$mealID = "\"".$row['id']."\"";
								
								$sql2 = "SELECT ingredients.Name
									FROM ((recipes 
									INNER JOIN ingredients on recipes.IngredientID = ingredients.id)
									INNER JOIN meals on recipes.MealID = meals.id)
									WHERE meals.id = $mealID";
								
								$result2 = $link->query($sql2);
								if($result2 !== false)
								{
									if ($result2->num_rows > 0) {
									  while($row = $result2->fetch_assoc()) {
										echo "<dd>".$row["Name"]."</dd>";
									  }
									}
								}
							  }
							} 
						}
						else {
							  echo "0 results";
							}
					?>
				</dl>
			</div>
		</div>
		<script src="Generic.js"></script>
	</body>
</html>