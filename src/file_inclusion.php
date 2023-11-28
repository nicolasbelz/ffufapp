<?php include 'header.php'; ?>
<h1>File Inclusion Vulnerable Page</h1>
<?php
if (isset($_GET['file'])) {
    $file = $_GET['file'];
    include("includes/" . $file); // This is vulnerable to local file inclusion
}
?>
<?php include 'footer.php'; ?>
