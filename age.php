<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AGE CALCULATION</title>
		<!--
			age.php
			- Simple age calculator that accepts a date (DOB) and prints the age in years.
			- This file intentionally keeps logic minimal and demonstrates PHP's DateTime and diff().
		-->
	</head>
	<body>
		<!-- HTML form: user selects a date (date of birth) and submits the form -->
		<form action="" method="post">
			<!--
				The input type="date" gives a browser-native date picker and sends
				a value in YYYY-MM-DD format. The `name` attribute is "dates" and
				is used in the $_POST superglobal on submit.
			-->
			<label for="dob">Enter DATE OF BIRTH</label>
			<input type="date" id="dob" name="dates">
			<input type="submit" value="Calculate Age">
		</form>

		<?php
		// ------------------------------
		// get_age
		// ------------------------------
		// Takes a date string (expected format: YYYY-MM-DD) and returns the
		// age in whole years by comparing against the current date.
		// Uses PHP's DateTime and DateInterval->y for a reliable year diff.
		function get_age($dob) {
			// Create a DateTime object from the provided DOB string
			$date = new DateTime($dob);

			// Get current date/time
			$today = new DateTime();

			// diff() returns a DateInterval object; ->y gives the full years
			$age = $today->diff($date)->y;

			// Return the computed age (integer)
			return $age;
		}

		// ------------------------------
		// Form handling
		// ------------------------------
		// Check if the form was submitted and the 'dates' field is present.
		if (isset($_POST['dates'])) {
			// Grab the raw submitted value. Note: in production you may wish to
			// validate the format and check for empty values.
			$date = $_POST['dates'];

			// Compute age using the helper function
			$age = get_age($date);

			// Output the result. We keep this simple and plain-text; use
			// htmlspecialchars() if you embed user data inside HTML attributes.
			echo "Your age is: " . $age;
		}
		?>
	</body>
</html>