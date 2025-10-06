<?php
// =====================
// Database connection
// =====================
$servername = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'sylvester';

// Connect to MySQL
$conn = mysqli_connect($servername, $db_user, $db_pass, $db_name);

// Check connection
if(!$conn) {
    die("Error occurred: " . mysqli_connect_error());
}

// =====================
// Function to load and display all data from 'users' table
// =====================
function loadData($connect) {
    $sql = "SELECT * FROM users"; // Select all records
    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Start HTML table
        echo "<table border='1' cellpadding='5'>
                <thead>
                    <tr>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>DEGREE</th>
                    </tr>
                </thead>
                <tbody>";

        // Loop through all rows
        while($rows = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$rows['NAME']}</td>
                    <td>{$rows['email']}</td>
                    <td>{$rows['Degree']}</td>
                  </tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "No rows found...";
    }
}

// =====================
// Update operation
// =====================
$updateQuery = "UPDATE users SET Degree = 'MCA' WHERE NAME = 'Sylvester'";

// Execute update query
if(mysqli_query($conn, $updateQuery)) {
    echo "Table updated successfully.<br>";
} else {
    echo "Update query didn't work: " . mysqli_error($conn) . "<br>";
}

// =====================
// Display the updated table
// =====================
loadData($conn);
?>
