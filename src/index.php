<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vulnerable Web App</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/sidebar.css">
</head>
<body>

<div class="navbar">
    <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="about/">About</a></li>
        <li><a href="admin/">Admin</a></li>
        <li><a href="api/v1/users.php">API v1</a></li>
        <li><a href="api/v2/users.php">API v2</a></li>
    </ul>
</div>

<div id="sidebar">
    <a href="sql_injection.php">SQL Injection</a>
    <a href="xss_vulnerable.php">XSS Vulnerable</a>
    <a href="directory_listing.php">Directory Listing</a>
    <a href="file_inclusion.php">File Inclusion</a>
</div>

<div id="main">
    <h1>Welcome to the Vulnerable Web Application</h1>
    <p>Select an option from the sidebar to access different vulnerable pages.</p>
</div>

</body>
</html>
