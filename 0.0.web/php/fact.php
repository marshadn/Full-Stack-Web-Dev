<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial Calculator</title>
</head>
<body>

    <h1>Factorial Calculator</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the form is submitted

        // Retrieve the user input
        $number = isset($_POST['number']) ? (int)$_POST['number'] : 0;

        // Calculate the factorial
        $factorial = 1;
        for ($i = 1; $i <= $number; $i++) {
            $factorial *= $i;
        }

        // Display the result
        echo "<h2>Factorial of $number is: $factorial</h2>";
    }
    ?>

    <form method="post" action="">
        Enter a number:
        <input type="number" name="number" required>
        <button type="submit">Calculate Factorial</button>
    </form>

</body>
</html>
