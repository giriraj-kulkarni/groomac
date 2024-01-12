
<?php
$result = ""; // Initialize result variable

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get parameters from the form
    $param1 = filter_input(INPUT_POST, 'param1', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 40)));
    $param2 = filter_input(INPUT_POST, 'param2', FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 40)));

    // Check if both parameters are valid integers
    if ($param1 !== false && $param2 !== false) {
        // Multiply the parameters
        $result = $param1 * $param2;
    } else {
        $result = "Please provide valid integers between 1 and 40 for both parameters.";
    }

    // Return result as JSON (for AJAX)
    echo json_encode(['result' => $result]);
}
?>