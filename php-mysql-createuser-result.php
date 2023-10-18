<?php
function OpenCon()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "litfam05Cookies0103!";
    $db = "mysql";
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
    return $conn;
}

function CloseCon($conn)
{
    $conn->close();
}

$conn = OpenCon();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        /* Center the form on the page */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 20px; /* Add margin to separate the forms */
        }

        .form-container:last-child {
            margin-right: 0; /* Remove margin from the last form */
        }

        input {
            margin: 5px;
        }
    </style>
</head>
<body>
<div class="form-container">
    <form method="post">
        <h2>Create User</h2>
        <input type="text" name="name" placeholder="Username">
        <br>
        <input type="text" name="host" placeholder="Host">
        <br>
        <input type="password" name="password" placeholder="Password">
        <br>
        <input type="submit" value="Create User">
    </form>
</div>

<div class="form-container">
    <form method="post">
        <h2>Login</h2>
        <input type="text" name="login_name" placeholder="Username">
        <br>
        <input type="text" name="login_host" placeholder="Host">
        <br>
        <input type="password" name="login_password" placeholder="Password">
        <br>
        <input type="submit" value="Login">
    </form>
</div>


<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = 'CREATE USER \'' . $_POST["name"] . '\'@\'' . $_POST["host"] . '\' IDENTIFIED BY \'' . $_POST["password"] . '\'';

    if (mysqli_query($conn, $sql)) {
        $name = urlencode($_POST["name"]);
        $host = urlencode($_POST["host"]);
        $password = urlencode($_POST["password"]);
        
        header("Location: success.php?name=$name&host=$host&password=$password");
        exit; // Stop executing the current script
    } else {
        echo "Could not create the user: " . mysqli_error($conn);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "Login") {
    $login_name = $_POST["login_name"];
    $login_host = $_POST["login_host"];
    $login_password = $_POST["login_password"];

    // Perform a SELECT query to check if the user exists
    $query = "SELECT * FROM mysql.user WHERE user = '$login_name' AND host = '$login_host' and password = '$login_password";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // User exists in the database
            echo "Login successful!";
        } else {
            // User does not exist
            echo "Login failed. Invalid credentials.";
        }
        //mysqli_free_result($result); // Free the result set
    } else {
        
        echo "Error executing the query: " . mysqli_error($conn);
    }
}



CloseCon($conn);
?>



</body>
</html>