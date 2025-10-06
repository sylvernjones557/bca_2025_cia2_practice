<html>
	<head>
	<title> AGE CALCULATION </title>
	</head>
	<body>
		<form action ="" method = "post">
		<label for="dob">Enter DATE OF BIRTH</label>
		<input type="date" id="dob" name="dates">
		<input type="submit">
		</form>
		<?php
			function get_age($dob){
			$date = new DateTime($dob);
			$today = new DateTime();
			$age = $today->diff($date)->y;
			return $age;

			}
		if(isset($_POST['dates'])){
			$date = $_POST['dates'];
			$age = get_age($date);
			echo "Your age is:".$age;
		}
?>
</body>
</html>