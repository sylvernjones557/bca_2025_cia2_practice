<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookie Practice</title>
</head>
<body>

    <!-- =====================
         Page Heading
         ===================== -->
    <h2>COOKIE PRACTICE</h2>

    <!-- =====================
         User Input Form
         ===================== -->
    <form action="" method="post">
        <!-- Input for username -->
        <label for="u_name">Enter your Name: </label>
        <input type="text" id="u_name" name="username" required>
        <!-- Submit button -->
        <input type="submit" value="Submit">
    </form>

    <?php
    // =====================
    // PHP: Cookie Handling
    // =====================

    // Check if form is submitted
    if (isset($_POST['username'])) {

        // Store username from input
        $us_name = $_POST['username'];

        // Create a unique cookie name for this user
        $cookie_name = $us_name . "_lastvisit";

        // =====================
        // Check if the cookie already exists
        // =====================
        if (isset($_COOKIE[$cookie_name])) {
            // If cookie exists, display the last visit time
            echo "<p>
                    Hi <b>$us_name</b>! You already have a cookie.<br>
                    Your last visit was on: <b>" . $_COOKIE[$cookie_name] . "</b>
                  </p>";
        } 
        else {
            // If cookie does not exist, welcome the user
            echo "<p>
                    Welcome <b>$us_name</b>! This is your first visit.<br>
                    A new cookie has been created for you.
                  </p>";
        }

        // =====================
        // Create or update the cookie
        // =====================
        // Parameters:
        // 1. Cookie name (unique per user)
        // 2. Cookie value (current date and time)
        // 3. Expiry time (30 days from now)
        // 4. Path ('/' means cookie is available across the entire site)
        setcookie($cookie_name, date("d-m-Y H:i:s"), time() + (60 * 60 * 24 * 30), "/");
    }
    ?>

</body>
</html>
