<!DOCTYPE html>
<html lang="En">

<!--Your Pantry-->

	<head>
		<link rel="stylesheet" href="Generic.css">
		<title>Your Pantry</title>
	</head>
	<body>
		<?php
			session_start();
			require_once 'NavBar.php';
			require_once 'config.php';
			$ingErr = "";
			
				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
			
			if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SERVER["REQUEST_METHOD"] == "POST")
			{
				//if newIngredient form was submitted
				if($_POST['formId'] == "EditIngredients")
				{
					//if it's editing an ingredient
					if(isset($_POST["edit"]))
					{
						if(!empty($_POST['itemName']))
						{
							$IngName = "\"" . test_input($_POST['itemName']) . "\"";
							
							$sql = "DELETE FROM ingredients WHERE Name = $IngName";
							//echo $sql;
							
							$link->query($sql);
							if($link -> affected_rows == 0)
							{$ingErr = "~No Such Ingredient Exists~";}
						}
						else
						{$ingErr = "~No Ingredient Selected~";}
					}
					//if it's deleting an ingredient
					else if(isset($_POST["remove"]))
					{
						if(!empty($_POST['itemName']))
						{
							$IngName = "\"" . test_input($_POST['itemName']) . "\"";
							
							$sql = "DELETE FROM ingredients WHERE Name = $IngName";
							//echo $sql;
							
							$link->query($sql);
							if($link -> affected_rows == 0)
							{$ingErr = "~No Such Ingredient Exists~";}
						}
						else
						{$ingErr = "~No Ingredient Selected~";}
					}
					//if it's a new ingredient being submitted (default)
					else
					{
						$Good = 'true';
						$IngName = $InPan = $Type = $Cost = "";
						
						if(empty($_POST['itemName'])){$Good = 'false';}
						else{$IngName = "\"" . test_input($_POST['itemName']) . "\"";}
						
						if(isset($_POST['InPantry']))
						{$InPan = "\"1\"";}
						else
						{$InPan = "\"0\"";}
						
						if(empty($_POST['radio'])){$Good = 'false';}
						else{$Type = "\"" . $_POST['radio'] . "\"";}
						
						if(empty($_POST['price'])){$Good = 'false';}
						else{$Cost = "\"" . $_POST['price'] . "\"";}
						
						
						if($Good == 'true')
						{
							$sql = "INSERT INTO ingredients (Name, InPantry, Type, Cost, UserID)
							VALUES ($IngName, $InPan, $Type, $Cost, $ID)";
							
							if ($link->query($sql) === TRUE) {
							} else {
							  echo "Error: " . $sql . "<br>" . $conn->error;
							}
							
							//clear data from the form?
							$_POST = array();
						}
						else
						{
							$ingErr = "~Missing Data~";
						}
					}
				}
				//if Add Ingredient was Submitted
				else if($_POST['formId'] == "AddToPantry")
				{
					$ingValue = "\"".test_input($_POST["NotInPantry"])."\"";
					
					$sql = "UPDATE ingredients SET InPantry = '1' WHERE ingredients.id = $ingValue";
					
					if ($link->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
					
					//clear data from the form?
					$_POST = array();
				}
				//if Remove Ingredient was Submitted
				else if($_POST["formId"] == "RemoveFromPantry")
				{
					$ingValue = "\"".test_input($_POST["InPantry"])."\"";
					
					$sql = "UPDATE ingredients SET InPantry = '0' WHERE ingredients.id = $ingValue";
					
					if ($link->query($sql) === TRUE) {
					} else {
					  echo "Error: " . $sql . "<br>" . $conn->error;
					}
					
					//clear data from the form?
					$_POST = array();
				}
			}
		?>
		<div class="header">
			<h1> <u> Your Pantr</u>y </h1>
		</div>
		<div class="content">
			<fieldset class="content-child">
				<ul id="highlightingList">
					<?php
						$sql = "SELECT id, Name, Cost FROM ingredients WHERE InPantry='1' AND UserID = $ID";
						$result = $link->query($sql);

						if($result !== false)
						{
						if ($result->num_rows > 0) {
						  while($row = $result->fetch_assoc()) {
							echo "<li id=".$row["id"].">".$row["Name"]."</li>";
						  }
						}} else {
						  echo "0 results";
						}
					?>
				</ul>
			</fieldset>
			
			<form class = "content-child" id = "removeIngredient" action=Pantry.php method="post">
				<h2>Remove Ingredient From Pantry</h2>
				<input type="hidden" name="formId" value="RemoveFromPantry">
				<label for="InPantry">Ingredients:</label>
				<select name="InPantry" id="InPantry">
				  <?php
						$sql = "SELECT Name, id FROM ingredients WHERE InPantry='1' AND UserID = $ID";
						$result = $link->query($sql);

						if ($result->num_rows > 0) {
						  while($row = $result->fetch_assoc()) {
							echo "<option value=\"".$row["id"]."\">".$row["Name"]."</option>";
						  }
						}
					?>
				</select>
				<input type="submit">
			</form>
			
			<form class = "content-child" id = "addIngredient" action=Pantry.php method="post">
				<h2>Add Ingredient to Pantry</h2>
				<input type="hidden" name="formId" value="AddToPantry">
				<label for="NotInPantry">Ingredients:</label>
				<select name="NotInPantry" id="NotInPantry">
				  <?php
					$sql = "SELECT Name, id FROM ingredients WHERE InPantry='0' AND UserID = $ID";
					$result = $link->query($sql);

					if ($result->num_rows > 0) {
					  while($row = $result->fetch_assoc()) {
						echo "<option value=\"".$row["id"]."\">".$row["Name"]."</option>";
					  }
					}
					?>
				</select>
				<input type="submit">
			</form>
			
			<form id = "PantryEntry" action = Pantry.php method="post" class="content-child">
				<h2>Edit your pantry Items</h2>
				<input type="hidden" name="formId" value="EditIngredients">
				<span class="error"><?php echo $ingErr;?></span><br>
				<label>Item name: <input type = "text" name="itemName" id = "listReturn" size = "25"/></label><br>
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
				<input type="submit" value="Edit" name="edit" disabled>
				<input type="submit" value="Add New" name="addNew">
				<input type="submit" value="Remove" name="remove">
			</form>
		</div>
		<script>
		makeListHighlightable();
		function makeListHighlightable() {
			var list = document.getElementById('highlightingList');
			if(list != null) {
				var items = list.getElementsByTagName('li');
				var selectedItem = null;
				
				for(var i = 0; i < items.length; i++) {
					var item = items[i];
					
					item.onclick = function () {
						if (selectedItem != null)
							{selectedItem.style.backgroundColor = getColor('Background');}
						selectedItem = this;
						this.style.backgroundColor = getColor('Highlight');
						document.getElementById("listReturn").value = this.innerText;
					}
					
					item.onmouseover = function() {
						this.style.backgroundColor = getColor('Highlight');
					}
					
					item.onmouseout = function() {
						if(this != selectedItem)
						{this.style.backgroundColor = getColor('Background');}
					}
				}
			}
		}
		
		var r = document.querySelector(':root');
		function getColor(varName) {
			var rs = getComputedStyle(r);
			//alert("The value of " +varName+ " is " + rs.getPropertyValue('--'+varName));
			return rs.getPropertyValue('--'+varName);
		}
		function setColor(varName, newColor) {
			r.style.setProperty('--'+varName, newColor);
		}
		</script>
	</body>
</html>