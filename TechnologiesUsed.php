<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" href="Generic.css">
		<title>TechnologiesUsed</title>
	</head>
	<body>
		<?php
			session_start();
			include 'NavBar.php'
		?>
		<div class="header">
			<h1><u>Web Technolo</u>gy</h1>
		</div>
		<div class = "content">
			<dl>
				<dt>HTML5</dt>
					<dd>Most of the pages in this website are based in HTML 5, that's how I can do <b>this</b> and <em>this</em> and this:
					<img src = "resources/Logo.svg" style="height: 100px;" alt="Meal Planning Logo"></dd>
				<dt>Canvas Element</dt>
					<dd>You can find the Canvas element on the front page, click and drag to draw and click the squares to select different colors!</dd>
				<dt>Video Element</dt>
					<dd>
					<video height="400" style="display: inline;" controls>
					<source src="resources/RickRoll.mp4" type="video/mp4">
					<source src="resources/RickRoll.ogg" type="video/ogg">
					Your browser does not support this video.
					</video>
					</dd>
				<dt>CSS</dt>
					<dd>All the design on these pages is done with CSS. The colors you see are actually variables, which means they can bechanged with the push of a button!
					<input type="button" value="Click Here" onclick="changeColors()"></dd>
				<dt>Javascript</dt>
					<dd>Almost everything that moves and changes on these pages is done with Javascript, it's how I make these fancy pop-ups to get names from the user!
					<input type="button" value="See?" onclick="openModal('testModal')">
					</dd>
				<dt>Dynamic Javascript</dt>
					<dd>Technically, all of my javascript is dynamic, as it happens on user input. The modal above is a great example.</dd>
				<dt>PHP</dt>
					<dd>I use PHP to access the database, as well as add the navigation bar and link in the top right corner to every page.</dd>
				<dt>Database</dt>
					<dd>The Database hold all the information about the user. If you're logged in, you'll see your username in the top right. That information is being pulled from the database! So are your ingredients, meals, and mealplans you've saved.</dd>
				<dt>SVG Logo</dt>
					<dd>All our graphics are SVGs, this allows them to be any size without getting pixelated:
					<br>
					<img src = "resources/Bee.svg" style="height: 100px;"  alt="SVG Bee @ 100 pixels">
					<img src = "resources/Bee.svg" style="height: 250px;" alt="SVG Bee @ 250 pixels">
					<img src = "resources/Bee.svg" style="height: 400px;" alt="SVG Bee @ 400 pixels">
					</dd>
				<dt>Webserver</dt>
					<dd>My webserver is hosted by Xampp, which means it's only local. You can't access it from any other computer, for now...</dd>
				<dt>XHTML validation</dt>
					<dd>Each one of my pages has been validated by an XHTML validator, so you know my code is top-notch</dd>
					<img src = "resources/Validation/Forms.png" style="height: 150px;" alt="Forms Validation">
					<img src = "resources/Validation/Grocery List.png" style="height: 150px;" alt="Grocery Validation">
					<img src = "resources/Validation/Join.png" style="height: 150px;" alt="Join Validation">
					<img src = "resources/Validation/Main.png" style="height: 150px;" alt="Main Validation">
					<img src = "resources/Validation/Meal Planning.png" style="height: 150px;" alt="Meal Planning Validation">
					<img src = "resources/Validation/Pantry.png" style="height: 150px;" alt="Pantry Validation">
					<img src = "resources/Validation/Password Reset.png" style="height: 150px;" alt="Password Reset Validation">
					<img src = "resources/Validation/Sign In.png" style="height: 150px;" alt="Sign In Validation">
					<img src = "resources/Validation/Technologies Used.png" style="height: 150px;" alt="Technologies Used Validation">
					<img src = "resources/Validation/User Profile.png" style="height: 150px;" alt="Profile Validation">
					<img src = "resources/Validation/ViewPage.png" style="height: 150px;" alt="View Page Validation">
			</dl>
		</div>
		<div id="testModal" class="modal">
			<div class="modal-content">
				<span class="close">&times;</span>
				<h1>Hello!</h1>
			</div>
		</div>
		<script src="Generic.js"></script>
		<script>
			var r = document.querySelector(':root');
		
			function changeColors()
			{
				r.style.setProperty('--Background', 'lightblue');
				r.style.setProperty('--coloredText', 'white');
				r.style.setProperty('--colorLight', '#000045');
				r.style.setProperty('--colorMid', '#000045');
				r.style.setProperty('--colorDark', '#000045');
			}
		</script>
	</body>
</html>