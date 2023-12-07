<?php 

// The correct ID value
$correct_id = '42'; // Replace this with the actual correct value.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'id' parameter is set and is correct
    if (isset($_POST['id']) && $_POST['id'] === $correct_id) {
        // Correct value, show the flag
        $flag = "FLAG{correct_value_found}"; // Replace with your actual flag.
        echo "<p>Correct ID provided: {$flag}</p>";
    } else {
        // Incorrect value, send a 403 Forbidden response
        http_response_code(403);
        echo "<p>Incorrect ID: You don't have access to read the flag!</p>";
    }
} else {
    // If the request method is not POST, handle accordingly or send a 405 Method Not Allowed
    http_response_code(405);
    echo "<p>Invalid request method.</p>";
}

echo "Welcome to the hidden vulnerable page. Check if you can fuzz values here to exploit the vulnerability";

?>


