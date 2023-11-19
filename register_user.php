<?php
// Database connection (replace with your database credentials)
$host = 'localhost';
$dbname = 'niki_library';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Registration logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $password]);
        $registrationSuccess = true;
    } catch (PDOException $e) {
        $registrationError = "Registration failed: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body style="background-color: #B2C8BA">
<nav class="navbar navbar-light justify-content-center fs-3 mb-5"
         style=" margin: auto;
                width: 50%;
                border: 3px solid black;
                padding: 10px;
                font-family: Lucida Sans Unicode, Lucida Grande;
               font-size: 25px;
               letter-spacing: 2px;
               word-spacing: 2px;
               color: #776B5D;
               font-weight: 900;
               text-align: center;"
               >
      NIKI'S LIBRARY
   </nav>

<body >

<h1>USER REGISTER FORM</h1>

<?php if (isset($registrationSuccess)): ?>
    <p style="color: green;">Registration successful! You can now log in.</p>
<?php endif; ?>

<?php if (isset($registrationError)): ?>
    <p style="color: red;"><?php echo $registrationError; ?></p>
<?php endif; ?>

<!-- Registration Form -->
<form method="post" action="" >
    <label for="username">Username:</label>
    <input type="text" name="username" required><br>
<br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
<br>
    <button type="submit" name="register">Register</button>
    <a href="login_user.php" class="btn btn-dark mb-3">Back</a>
</form>
<style>
        form 
         {
            margin-top: 50px;
            text-align: center;
         }
         h1
        {
            font-family: "Arial Black", Gadget, sans-serif;
            font-size: 25px;
            letter-spacing: 2px;
            word-spacing: 2px;
            color: black;
            font-weight: 700;
            text-align: center;
           
            
        }
        body {
    background-color: #B2C8BA;
    font-family: 'Lucida Sans Unicode', 'Lucida Grande', sans-serif;
}

nav {
    margin: auto;
    width: 50%;
    border: 3px solid black;
    padding: 10px;
    font-size: 25px;
    letter-spacing: 2px;
    word-spacing: 2px;
    color: #776B5D;
    font-weight: 900;
    text-align: center;
    background-color: #fff;
}

h1 {
    font-family: "Arial Black", Gadget, sans-serif;
    font-size: 25px;
    letter-spacing: 2px;
    word-spacing: 2px;
    color: black;
    font-weight: 700;
    text-align: center;
    margin-top: 50px;
}

form {
    margin-top: 20px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 8px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    box-sizing: border-box;
}

button {
    background-color: #28a745;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #218838;
}

a {
    display: inline-block;
    margin-top: 10px;
    color: #343a40;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    color: #1d2124;
}
body
{
    margin-right: 150px;
    margin-left: 150px;
}

</style>
</body>
</html>
