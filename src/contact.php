<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
</head>
<body>
    <h1>Contact Us</h1>
    <form action="contact.php" method="post">
        Name: <input type="text" name="name"><br>
        Email: <input type="text" name="email"><br>
        Message:<br>
        <textarea name="message" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Send">
    </form>
</body>
</html>
<?php include 'footer.php'; ?>