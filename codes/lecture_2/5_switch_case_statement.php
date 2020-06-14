<?php
$number = 2;
$numberToWord = "NULL";

switch ($number) {
    case 0:
        $numberToWord = "Zero";
        break;
    case 1:
        $numberToWord = "One";
        break;
    case 2:
        $numberToWord = "Two";
        break;
    case 3:
        $numberToWord = "Three";
        break;
    case 4:
        $numberToWord = "Four";
        break;
    case 5:
        $numberToWord = "Five";
        break;
    case 6:
        $numberToWord = "Six";
        break;
    case 7:
        $numberToWord = "Seven";
        break;
    case 8:
        $numberToWord = "Eight";
        break;
    case 9:
        $numberToWord = "Nine";
        break;
    default:
        $numberToWord = $number;
}

echo "{$number} ($numberToWord)";
