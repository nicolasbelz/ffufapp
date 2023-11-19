<?php include '../header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <?php
    // Define the correct key
    $correct_key = '3x@mpl3_K3yP@r@m3t3r_2O23';
    
    // Function to check the key and return true if it's correct
    function check_key($key) {
        global $correct_key;
        return isset($key) && $key === $correct_key;
    }

    // Check both GET and POST for the correct key
    $key_is_correct = $_SERVER['REQUEST_METHOD'] === 'POST' ? check_key($_POST['key']) : check_key($_GET['key']);

    if ($key_is_correct) {
        // If the correct key is provided, show the flag
        echo "<p>Flag: {your_flag_here}</p>"; // Replace with your actual flag
    } else {
        // If the key is incorrect, return a 403 Forbidden status code
        http_response_code(403);
        echo "<p>You don't have the access to read the flag!</p>";
        exit(); // Terminate the script to prevent further execution
    }
    ?>
    <a href="settings.php">Settings</a> | <a href="users/">Manage Users</a>
</body>
</html>

<?php include '../footer.php'; ?>
