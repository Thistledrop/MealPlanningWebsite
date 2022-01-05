<!DOCTYPE html>
<html lang="En">
<!--Meal Planning-->

	<head>
		<link rel="stylesheet" href="Generic.css">
		<title>Meal Planning</title>
	</head>
	<body>
		<?php
			session_start();
			include 'NavBar.php'
		?>
		<div class="header">
			<h1><u>Plan your Meals</u></h1>
		</div>
		<div class="content">
			<table id="highlightingGrid" class="content-child">
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
									echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
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
									echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
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
									echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
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
									echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
							}
						}
						else
							echo "<td></td><td></td><td></td><td></td><td></td><td></td><td></td>";
						?>
					</tr>
				</table>
		
			<div class = "content-child">
				<form class = "content-child" id = "newMealPlan" action=MealPlanning.php method="post">
					<legend> Various settings to set up the mealplan </legend>
					<input type="hidden" name="formId" value="NewMealPlan">
					<label for="rules">Choose a ruleset:</label>
						<select name="rules" id="rules">
						  <option value="volvo">Ruleset 1</option>
						  <option value="saab">Ruleset 2</option>
						  <option value="mercedes">Ruleset 3</option>
						  <option value="audi">Ruleset 4</option>
						</select>
						
					<label class="CheckContainer">Include Breakfasts
						<input type="checkbox" checked="checked" name="includes">
						<span class="checkmark"></span>
					</label>
					<label class="CheckContainer">Include Lunches
						<input type="checkbox"  checked="checked" name="includes">
						<span class="checkmark"></span>
					</label>
					<label class="CheckContainer">Include Snacks
						<input type="checkbox"  checked="checked" name="includes">
						<span class="checkmark"></span>
					</label>
					<label class="CheckContainer">Include Dinners
						<input type="checkbox"  checked="checked" name="includes">
						<span class="checkmark"></span>
					</label>

					<input type="submit" value="Generate a Meal Plan">
					<input type="button" value="Save This Meal Plan" onclick="openModal('planModal')">
					<input type="button" value="Print" onclick="openModal('printModal')">
				
					<div id="planModal" class="modal">
						<div class="modal-content">
							<span class="close">&times;</span>
							<h1> What should we name this meal plan? </h1>
							<input type="text" id="planTxt" class="textbox"/>
							<input type="button" value="Save" class="button"/>
							<p class="warning" style="display: none;">This plan needs a name!</p>
						</div>
					</div>
					
					<div id="rulesModal" class="modal">
						<div class="modal-content">
							<span class="close">&times;</span>
							<h1> What should we name these meal plan rules? </h1>
							<input type="text" id="rulesTxt" class="textbox"/>
							<input type="button" value="Save" class="button"/>
							<p class="warning" style="display: none;">These rules need a name!</p>
						</div>
					</div>
					
					<div id="printModal" class="modal">
						<div class="modal-content">
							<span class="close">&times;</span>
							<h1> Print </h1>
							<p> I dunno how this will work yet! </p>
						</div>
					</div>
				</form>
				<fieldset>
					<legend>Select a meal to see it's ingrediants and recipe </legend>
					<label>Meal Name: <input type = "text" id = "gridReturn" size = "25"/></label>
				</fieldset>
			</div>
		</div>
		<script src="Generic.js"></script>
	</body>
</html>