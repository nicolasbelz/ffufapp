<?php 
// Enable error reporting for debugging. Remove this line in production.
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the correct key
$correct_key = '3x@mpl3_K3yP@r@m3t3r_2O23';

// Initialize a variable to determine if the key is correct
$is_authorized = false;

// Check for the key in GET or POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['key']) && $_POST['key'] === $correct_key) {
    $is_authorized = true;
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['key']) && $_GET['key'] === $correct_key) {
    $is_authorized = true;
}

// If the key is incorrect, send a 403 Forbidden status code
if (!$is_authorized) {
    http_response_code(403);
    echo "Forbidden: You do not have access to read the flag.";
    exit; // Stop script execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <?php if ($is_authorized): ?>
        <!-- The sensitive information is shown only when the correct key is provided -->
        <p>Flag: {admin_panel_flag}</p>
    <?php endif; ?>
    <a href="settings.php">Settings</a> | <a href="users/">Manage Users</a>
</body>
</html>