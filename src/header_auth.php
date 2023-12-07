<?php
// header_auth.php
$expectedToken = '4b82Km29Fv6zQ3xT8pW5Jr7Hn'; // The expected token value

if (isset($_SERVER['HTTP_X_CUSTOM_AUTH']) && $_SERVER['HTTP_X_CUSTOM_AUTH'] === $expectedToken) {
    echo "Authentication successful. Access granted to sensitive content.";
    // Include sensitive content or operations here
} else {
    http_response_code(401); // Unauthorized
    echo "Authentication failed.";
}
echo "Try Custom Header Fuzzing to exploit the vulnerability";
