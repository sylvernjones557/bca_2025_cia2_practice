<!DOCTYPE html>
<html>
<head>
    <title>Database Insert</title>
</head>
<body>

    <!-- =====================
         Page Heading
         ===================== -->
    <h2>DATABASE INSERT</h2>

    <!-- =====================
         User Input Form
         ===================== -->
    <form action="" method="post">
        <label>Enter your Name:</label>
        <input type="text" name="username" required><br><br>

        <label>Enter your Email ID:</label>
        <input type="email" name="emailid" required><br><br>

        <label>Degree:</label>
        <input type="text" name="degree" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // =====================
    // Database connection
    // =====================
    require "db_conn_one.php"; // File should create $conn variable

    // =====================
    // Function to display all user records
    // =====================
    function display($conn) {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h3>Stored User Data:</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>NAME</th><th>Email</th><th>Degree</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['NAME']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['Degree']}</td>
                      </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>No records found.</p>";
        }
    }

    // =====================
    // Insert record into database if form submitted
    // =====================
    if (isset($_POST['username'], $_POST['emailid'], $_POST['degree'])) {
        $name = $_POST['username'];
        $email = $_POST['emailid'];
        $degree = $_POST['degree'];

        $sql = "INSERT INTO users(NAME, email, Degree) VALUES('$name', '$email', '$degree')";

        if (mysqli_query($conn, $sql)) {
            echo "<p>✅ New user inserted successfully.</p>";
        } else {
            echo "<p>❌ Error: " . mysqli_error($conn) . "</p>";
        }
    }

    // =====================
    // Display all data
    // =====================
    display($conn);
    ?>

</body>
</html>
