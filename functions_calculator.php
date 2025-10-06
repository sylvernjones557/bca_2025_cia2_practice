<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <!-- =====================
         Calculator Form
         ===================== -->
    <h2>SIMPLE CALCULATOR</h2>
    <form method="post" action="">
        <!-- First Number -->
        <div>
            <label>Enter the first Number:</label>
            <input type="number" name="num1" required>
        </div>
        
        <!-- Second Number -->
        <div>
            <label>Enter the second Number:</label>
            <input type="number" name="num2" required>
        </div>

        <!-- Operation Selection -->
        <div>
            <label>Select an operation:</label>
            <div>
                <label><input type="radio" name="operation" value="1" required> ADDITION</label>
                <label><input type="radio" name="operation" value="2"> SUBTRACTION</label>
                <label><input type="radio" name="operation" value="3"> PRODUCT</label>
                <label><input type="radio" name="operation" value="4"> QUOTIENT</label>
            </div>
        </div>

        <!-- Submit Button -->
        <div>
            <input type="submit" value="Calculate">
        </div>
    </form>

    <?php
    // =====================
    // Calculator Functions
    // =====================
    function addNumbers($num1, $num2) {
        return $num1 + $num2;
    }

    function subNumbers($num1, $num2) {
        return $num1 - $num2;
    }

    function proNumbers($num1, $num2) {
        return $num1 * $num2;
    }

    function quoNumbers($num1, $num2) {
        // Handle division by zero
        if ($num2 == 0) {
            return "Division by zero is not allowed";
        }
        return $num1 / $num2;
    }

    // =====================
    // Processing the form
    // =====================
    if (isset($_POST['num1'], $_POST['num2'], $_POST['operation'])) {

        $number1 = $_POST['num1'];
        $number2 = $_POST['num2'];
        $operator = $_POST['operation'];

        // Perform calculation based on selected operation
        switch ($operator) {
            case 1:
                $result = addNumbers($number1, $number2);
                $message = "The sum of $number1 and $number2 is: $result";
                break;

            case 2:
                $result = subNumbers($number1, $number2);
                $message = "The result of subtraction is: $result";
                break;

            case 3:
                $result = proNumbers($number1, $number2);
                $message = "The product is: $result";
                break;

            case 4:
                $result = quoNumbers($number1, $number2);
                $message = "The quotient is: $result";
                break;

            default:
                $message = "Error: Invalid operation selected.";
        }

        // Display result safely
        echo "<h3>" . htmlspecialchars($message) . "</h3>";
    }
    ?>
</body>
</html>
