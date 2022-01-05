<!DOCTYPE html>
<html lang="En">
<!--User Profile Page-->
	<head>
		<link rel="stylesheet" href="Generic.css">
		<title>Your Profile</title>
	</head>
	<body>
		<?php
			session_start();
			require_once "config.php";
			if($_SERVER["REQUEST_METHOD"] == "POST") {

				if(isSet($_POST["username"]))
					$_SESSION["username"] = test_input($_POST["username"]);
				if(isSet($_POST["password"]))
					$_SESSION["password"] = test_input($_POST["password"]);
				
				if(isSet($_POST["profile"]))
				{
					$_SESSION["profile"] = $_POST["profile"];
					// Prepare an insert statement
					$sql = "UPDATE users SET ProfilePicture = ? WHERE id = ?";
					if($stmt = mysqli_prepare($link, $sql)){
						// Bind variables to the prepared statement as parameters
						mysqli_stmt_bind_param($stmt, "si", $_SESSION['profile'], $_SESSION['id']);
						// Attempt to execute the prepared statement
						if(mysqli_stmt_execute($stmt)){
							// Password updated successfully. Destroy the session, and redirect to login page
							header("location: Profile.php");
							exit();
						} else{
							echo "Oops! Something went wrong. Please try again later.";
						}
							}
						}
			}
			
			include 'NavBar.php';
			
			function test_input($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}
		?>
		<div class="header">
			<h1><u>Your Profile</u></h1>
		</div>
		<div class="content">
			<form action="Profile.php" method="post" class="content-child">
			<h2>Welcome<?php
				if(isSet($_SESSION["username"]))
					echo ", " . $_SESSION["username"];
				else
					echo "";
			?>!</h2>
			
			<div id="profilePictures">
				<p>Choose a profile picture:</p><input type = "hidden" id="profile" name = "profile"/>
				<img src="resources/cereal.svg" height="100" id="cereal" alt="Cereal Profile picture option">
				<img src="resources/olive.svg" height="100" id="olive" alt="Olive Profile picture option">
				<img src="resources/pizza.svg" height="100" id="pizza" alt="Pizza Profile picture option">
				<img src="resources/dinner.svg" height="100" id="dinner" alt="Dinner Profile picture option">
				<img src="resources/wine.svg" height="100" id="wine" alt="Wine Profile picture option">
			</div>
			<input type="submit" value="Apply Changes"/>
			</form>

			<form action="Main.php" method="post" class="content-child">
				<a href="PasswordReset.php" class="btn btn-warning">Reset Your Password</a><br>
				<a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
			</form>
		</div>
		<script src="Generic.js"></script>
		<script>
			makeImagesSelectable();
			function makeImagesSelectable()
			{
				var profield = document.getElementById("profile");
				var group = document.getElementById('profilePictures');
				var images = group.getElementsByTagName('img');
				var selectedImage = null;
				
				for(var i = 0; i < images.length; i++) {
					var image = images[i];
					
					image.onclick = function() {
						profield.value = this.id;
						
						if(selectedImage != null)
						{selectedImage.style.border = "none";}
						selectedImage = this;
						this.style.border = "inset " + getColor('Highlight') + " 2px";
					}
				}
			}
		</script>
	</body>
</html>