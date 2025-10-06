<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Operation</title>
</head>
<body>

    <!-- =====================
         Delete Form
         ===================== -->
    <h2>DELETE USER</h2>
    <form action="" method="post">
        <label for="u_name">Enter Name to delete:</label>
        <input type="text" id="u_name" name="username" required>
        <input type="submit" value="Delete">
    </form>

    <?php
    // =====================
    // Database connection
    // =====================
    $server = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'sylvester';

    // Connect to MySQL database
    $conn = mysqli_connect($server, $db_user, $db_pass, $db_name);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // =====================
    // Function to display all user data in a table
    // =====================
    function loadData($connect) {
        $sql = "SELECT * FROM users";
        $result = mysqli_query($connect, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Table header
            echo "<h3>All Users</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<thead><tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Degree</th>
                  </tr></thead><tbody>";

            // Table rows
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$rows['NAME']}</td>
                        <td>{$rows['email']}</td>
                        <td>{$rows['Degree']}</td>
                      </tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "<p>No records found.</p>";
        }
    }

    // =====================
    // Delete operation
    // =====================
    if (isset($_POST['username'])) {
        $name = $_POST['username'];

        $sql_delete = "DELETE FROM users WHERE NAME='$name'";
        if (mysqli_query($conn, $sql_delete)) {
            echo "<p>✅ Record deleted successfully!</p>";
        } else {
            echo "<p>❌ Error deleting record: " . mysqli_error($conn) . "</p>";
        }
    }

    // Load and display all data
    loadData($conn);

    ?>
</body>
</html>
