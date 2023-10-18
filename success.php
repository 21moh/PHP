<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
</head>
<body>
    <h2>User has been created successfully</h2>
    
    <p>Username: <?php echo htmlspecialchars($_GET['name']); ?></p>
    <p>Host: <?php echo htmlspecialchars($_GET['host']); ?></p>
    <p>Password: <?php echo htmlspecialchars($_GET['password']); ?></p>

    <br>
    <form method="post" action="php-mysql.php">
        <button type="submit">Show User List</button>
    </form>

    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d50029.9827654221!2d-71.44046177148299!3d42.56215468658723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1697533697727!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



</body>
</html>

