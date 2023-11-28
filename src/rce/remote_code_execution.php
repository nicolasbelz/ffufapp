<?php include '../header.php'; ?>
<h1>Remote Code Execution Vulnerable Page</h1>
<form method="post">
    <label for="code">Enter PHP code to execute:</label>
    <input type="text" id="code" name="code">
    <input type="submit" value="Execute">
</form>

<?php
if (isset($_POST['code'])) {
    eval($_POST['code']); // This is extremely dangerous and vulnerable to RCE
}
?>
<?php include '../footer.php'; ?>
