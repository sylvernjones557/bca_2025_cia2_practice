<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session Practice</title>
</head>
<body>

    <!-- =====================
         Page Heading
         ===================== -->
    <h2>SESSION PRACTICE</h2>

    <!-- =====================
         Simple input form
         ===================== -->
    <form action="" method="post">
        <label for="u_name">Enter your Name: </label>
        <input type="text" id="u_name" name="username" required>
        <input type="submit" value="Submit">
    </form>

<?php
// Start the session
session_start();

// Check if the form was submitted
if(isset($_POST['username'])){

    // Store the submitted username
    $name = $_POST['username'];

    // Create a unique session key for this user
    $key = $name . 'lastvisit';

    // Check if this user already has a session
    if(isset($_SESSION[$key])){
        // User has visited before
        echo "<p>HI! $name — You have a session available.<br>";
        echo "Your session will expire when you close this window.</p>";
        echo "<p>Last visit on: " . $_SESSION[$key] . "</p>";
    } else {
        // New user session
        echo "<p>HI! $name — Since you are new, a session will be created.<br>";
        echo "Your session will expire when you close this window.</p>";
    }

    // Update session with current visit time
    $_SESSION[$key] = date("d-m-Y H:i:s");
}
?>

</body>
</html>
