<?php
$year = 2023;
echo "Input: $year<br>";
if ($year % 4 ==0 && ($year % 100 != 0 || $year % 400 == 0)) {
    echo "Output: $year is a leap year.";
} else {
    echo "Output: $year is not a leap year.";
}
?>