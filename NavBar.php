<?php
	require_once "config.php";
	
	$plink = $image = $text = "";
	$ID = "Guest";

	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		$plink = "SignIn.php";
		$text = "Sign In!";
		$image = "resources/Bee.svg";
	}
	else
	{
		$plink = "Profile.php";
		//get username & profile image from database
		
		$ID = $_SESSION["id"];
		$sql = "SELECT username, ProfilePicture FROM users WHERE id = $ID";
		//$sql = "SELECT id, firstname, lastname FROM MyGuests";
		$result = $link->query($sql);

		//if ($result->num_rows > 0) {
		  // output data of each row
		//  while($row = $result->fetch_assoc()) {
		//	echo "Name: " . $row["username"]. " - Picture: " . $row["ProfilePicture"]. "<br>";
		// }
		//} else {
		//  echo "0 results";
		//}
		$row = $result->fetch_assoc();
		
		$UsNm = $row["username"];
		$text = "Welcome, $UsNm!";
		$Img = $row["ProfilePicture"];
		$image = "resources/$Img.svg";
	}
	
?>
		<a href="Main.php"><img src = "resources/Logo.svg" id = "logo" alt="MealPlanning Logo"></a>
		
		<div class="profileDiv">
			<a href=
			<?php
				echo $plink;
			?>
			><img src = 
			<?php
					echo $image;
			?>
			id="profileImage" alt="Profile Picture">
			</a>
			<a href=
			<?php
				echo $plink;
			?>
			id="profileLink">
			<?php
				echo $text;
			?>
			</a>
		</div>
	
	<div class="sidenav">
		<a href="Pantry.php">Pantry</a>
		<a href="ViewPage.php">Add Meals/Ingredients</a>
		<a href="MealPlanning.php">Make a meal plan</a>
		<a href="GroceryList.php">Grocery List</a>
		<a href="FormTesting.php">Temporary Forms Page</a>
		<a href="TechnologiesUsed.php">Technology</a>
	</div>