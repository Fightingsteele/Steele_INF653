<?php
$grade = 85;
echo "Input: $grade<br>";
if ($grade >= 90) {
    echo "Output: You got an A.";
} elseif ($grade >= 80) {
    echo "Output: You got a B.";
} elseif ($grade >= 70) {
    echo "Output: You got a C.";
} elseif ($grade >= 60) {
    echo "Output: You got a D.";
} else {
    echo "Output: You got an F.";
}
?>