<?php include 'header.php'; ?>
<h1>XSS Vulnerable Page</h1>
<form method="get">
    <label for="name">Enter your name:</label>
    <input type="text" id="name" name="name">
    <input type="submit" value="Submit">
</form>

<?php
if (isset($_GET['name'])) {
    // This echoes user input directly to the page - vulnerable to XSS
    echo "Hello, " . $_GET['name'] . "!";
}
?>
<?php include 'footer.php'; ?>
