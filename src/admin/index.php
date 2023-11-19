<?php include '../header.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <?php
    // Check if the 'key' GET parameter is set and if it is the correct one
    $correct_key = '3x@mpl3_K3yP@r@m3t3r_2O23'; // This should be a complex and secret key
    if (isset($_GET['key']) && $_GET['key'] === $correct_key) {
        echo "<p>Flag: {your_flag_here}</p>"; // Display the sensitive information
    } else {
        echo "<p>You don't have the access to read the flag!</p>"; // Access denied message
    }
    ?>
    <a href="settings.php">Settings</a> | <a href="users/">Manage Users</a>
</body>
</html>

<?php include '../footer.php'; ?>
