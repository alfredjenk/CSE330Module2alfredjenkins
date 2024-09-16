<?php

if (isset($_GET['firstNum'], $_GET['secondNum'], $_GET['operation'])) {
    
    $firstNum = (float) $_GET['firstNum'];
    $secondNum = (float) $_GET['secondNum'];
    $operation = $_GET['operation'];
    $answer = null;

    
    switch ($operation) {
        case 'add':
            $answer = $firstNum + $secondNum;
            break;
        case 'subtract':
            $answer = $firstNum - $secondNum;
            break;
        case 'multiply':
            $answer = $firstNum * $secondNum;
            break;
        case 'divide':
            if ($secondNum == 0) {
                $answer = "cannot divide by ZERO";
            } else {
                $answer = $firstNum / $secondNum;
            }
            break;
        default:
            $answer = "cannot do that operation";
            break;
    
            
    }

    echo "PHP Calculator";
    echo "Answer: " . htmlspecialchars($answer) . "";
    echo '<a href="calculater_input.php">  Go Back </a>';
} else {
    echo "No data sowwy;(";
}
?>