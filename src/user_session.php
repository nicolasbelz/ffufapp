<?php
// Check for a specific cookie
if (!isset($_COOKIE['access_token']) || $_COOKIE['access_token'] !== 'XJ92n#k@3ZQ!8hT6v') {
    header('Location: /unauthorized.html'); // Redirect if the cookie doesn't match
    exit;
}

// Vulnerable code here (e.g., SQL injection, XSS)
echo "Welcome to the hidden vulnerable page.";
