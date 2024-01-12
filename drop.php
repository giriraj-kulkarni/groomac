<?php
// Fetch the content of process.php
$filePath = 'C:\xampp\htdocs\web\electronproject\process.php'; // Ensure this path is correct
$content = file_get_contents($filePath);

// Get parameters from the form
$param1 = filter_input(INPUT_POST, 'param1', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 40)));
$param2 = filter_input(INPUT_POST, 'param2', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 40)));

// Check if both parameters are valid integers
if ($param1 !== false && $param2 !== false) {
    // Print the values of param1 and param2
    echo "Parameter 1: " . $param1 . "<br>";
    echo "Parameter 2: " . $param2 . "<br>";

    // Replace parameters in the content
    $content = str_replace('$param1', $param1, $content);
    $content = str_replace('$param2', $param2, $content);

    // Execute the modified content using eval()
    eval($content);
} else {
    echo "Please provide valid integers between 1 and 40 for both parameters.";
}
?>
