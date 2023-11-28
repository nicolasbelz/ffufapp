<?php 
include 'header.php'; 

$host = 'localhost'; // Your database host
$db   = 'vulnerable_db'; // Your database name
$user = 'root'; // Your database username
$pass = 'password'; // Your database password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Vulnerable SQL Query
if (isset($_GET['id'])) {
    $id = $_GET['id']; // User input is directly included without sanitization or prepared statements
    $stmt = $pdo->query("SELECT * FROM users WHERE id = '$id'");
    while ($row = $stmt->fetch()) {
        echo htmlentities($row['name'])."<br/>"; // Assuming 'name' is a column in your 'users' table
    }
} else {
    echo "Please provide a user ID.";
}
?>

<?php include 'footer.php'; ?>
