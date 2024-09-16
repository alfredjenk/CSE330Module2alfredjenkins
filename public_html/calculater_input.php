<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>PHP Calculator</title>
</head>
<body>

<h2>PHP Calculator</h2>
<form method="GET" action="calculator_after.php">
    <label for="firstNum">Number 1:</label>
    <input type="number" name="firstNum" id="firstNum" step="any" required>
    <br><br>
    
    <label for="secondNum">Number 2:</label>
    <input type="number" name="secondNum" id="secondNum" step="any" required>
    <br><br>

    <label>Operation:</label>
    <input type="radio" name="operation" value="add" required> Addition
    <input type="radio" name="operation" value="subtract" required> Subtraction
    <input type="radio" name="operation" value="multiply" required> Multiplication
    <input type="radio" name="operation" value="divide" required> Division
    <br><br>

    <button type="submit">Calculate</button>
</form>



</body>
</html>

