<?php
	session_start();
	require_once 'NavBar.php';
	require_once 'config.php';
	
	$ingErr = "";
	$mealErr = "";
	
	//If user is logged in and form was submitted
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SERVER["REQUEST_METHOD"] == "POST")
	{
		//if newIngredient form was submitted
		if($_POST["formId"] == "Ingredients")
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
			else{$Type = "\"" . test_input($_POST['radio']) . "\"";}
			
			if(empty($_POST['price'])){$Good = 'false';}
			else{$Cost = "\"" . test_input($_POST['price']) . "\"";}
			
			
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
		//if Add Ingredient was Submitted
		else if($_POST['formId'] == "AddToPantry")
		{
			$ingValue = "\"".$_POST["NotInPantry"]."\"";
			
			$sql = "UPDATE ingredients SET InPantry = '1' WHERE ingredients.id = $ingValue";
			
			if ($link->query($sql) === TRUE) {
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			//clear data from the form?
			$_POST = array();
		}
		//if Remove Ingredient was Submitted
		else if($_POST['formId'] == "RemoveFromPantry")
		{
			$ingValue = "\"".$_POST["InPantry"]."\"";
			
			$sql = "UPDATE ingredients SET InPantry = '0' WHERE ingredients.id = $ingValue";
			
			if ($link->query($sql) === TRUE) {
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
			
			//clear data from the form?
			$_POST = array();
		}
		//if New Meal was submitted
		else if($_POST['formId'] == "NewMeal")
		{
			$Name = $Type = $Prep = $Calories = $Recipe = "";
			
			if(!empty($_POST['mealName']))
			{
				$Name = "\"".$_POST['mealName']."\"";
				$Type = "\"".$_POST['mealType']."\"";
				if(isset($_POST['easyPrep']))
				{$Prep = "\"1\"";}
				else
				{$Prep = "\"0\"";}
				
				if(!empty($_POST['calories'])){$Calories = "\"".$_POST['calories']."\"";}
				else{$Calories = "\"0\"";}
				
				if(!empty($_POST['recipe'])){$Recipe = "\"".$_POST['recipe']."\"";}
				else{$Recipe = "\"\"";}
				
				$sql = "INSERT INTO meals (Name, MealType, EasyPrep, Calories, UserId, Recipe)
				VALUES ($Name, $Type, $Prep, $Calories, $ID, $Recipe)";
				
				if ($link->query($sql) === TRUE) {
				} else {
				  echo "Error: " . $sql . "<br>" . $link->error;
				}
				//TODO: Create meal Inclusions
				
				//get all the ingredients that were checked
				//for each, build an sql statment
				if(!empty($_POST['ingredients_list'])) {
					foreach($_POST['ingredients_list'] as $selected) 
					{
						//get MealID from the meal just created
						$sql = "SELECT id FROM meals WHERE Name = $Name";
						$result = $link->query($sql);
						
						$mealId ="~";
						
						if ($result->num_rows > 0) {
						  while($row = $result->fetch_assoc()) {
							$mealId = "\"".$row["id"]."\"";
							//echo "<label class=\"CheckContainer\">".$row["Name"]."<input type=\"checkbox\" name=\"ingredients_list[]\" value=".$row["id"]."><span class=\"checkmark\"></span></label>";
						  }
						}
						else
						{
							$mealErr = "~An Error occured...~";
							break;
						}
						
						$ingId = "\"".$selected."\"";
						
						$sql = "INSERT INTO `recipes`(`MealID`, `IngredientID`) VALUES ($mealId, $ingId)";
						if ($link->query($sql) === TRUE) {
						} else {
						  echo "Error: " . $sql . "<br>" . $link->error;
						}
					}
				}
				else
				{
					$mealErr = "~You must select at least one ingredient~";
				}
			}
			else
			{
				$mealErr = "~Missing Data~";
			}
		}
	}
	
	function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>