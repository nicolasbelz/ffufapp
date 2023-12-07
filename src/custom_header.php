<?php
// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check for the custom header and POST data
    $headerPresent = isset($_SERVER['HTTP_X_CUSTOM_HEADER']);
    $keyCorrect = ($_POST['key'] ?? '') === 'secretValue';

    if ($headerPresent && $keyCorrect) {
        http_response_code(200); // OK
        echo "Vulnerability Triggered! Header and Key are correct.";
    } else {
        http_response_code(403); // Forbidden
        if (!$headerPresent) {
            echo "Access Denied. Incorrect or Missing Header.";
        } elseif (!$keyCorrect) {
            echo "Access Denied. Incorrect Key.";
        }
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo "Invalid request method. This page expects a POST request.";
}

echo "Try Custom Header Fuzzing to exploit the vulnerability"
?>
