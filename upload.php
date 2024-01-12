<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Get selected directory from the form
    $selected_directory = $_POST["directory"];
    
    // Define the target directory based on the selected option
    if ($selected_directory === "php_files") {
        $target_directory = "php_files/";
    } elseif ($selected_directory === "another_directory") {
        $target_directory = "another_directory/";
    } else {
        echo "Invalid directory selected.";
        exit; // Stop further execution
    }

    // Generate a unique file name based on the current timestamp to allow multiple uploads
    $uniqueFileName = time() . '_' . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_directory . $uniqueFileName;
    
    // Set uploadOk to 1 by default
    $uploadOk = 1;
    
    // Check if the uploaded file is a PHP file
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if($fileType != "php") {
        echo "Sorry, only PHP files are allowed.";
        $uploadOk = 0;
    }

    // Check if file size exceeds the limit (Here, set to 500KB for simplicity)
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Try to upload the file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . $uniqueFileName . " has been uploaded to " . $selected_directory . " directory.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
