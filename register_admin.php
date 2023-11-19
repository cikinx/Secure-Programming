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

// Admin Registration logic
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

    try {
        $stmt = $pdo->prepare("INSERT INTO admin (username, password) VALUES (?, ?)");
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
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }

        .container {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            margin: auto;
               width: 50%;
               padding: 10px;
               font-family: 'Arial Black', Gadget, sans-serif;
               font-size: 30px;
               letter-spacing: 2px;
               word-spacing: 2px;
               color: black;
               font-weight: 900;
               text-align: center;
               background-color: #f8f9fa;
               border-radius: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-size: 18px;
            color: #343a40;
            margin-bottom: 5px;
        }

        input {
            margin-bottom: 15px;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            width: 300px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-dark {
            font-weight: bold;
            text-decoration: none;
            background-color: #343a40;
            color: #fff;
            padding: 10px 20px;
            border-radius: 8px;
            margin-top: 10px;
            font-size: 16px;
        }

        .btn-dark:hover {
            background-color: #23272b;
        }

        h3
        {
               margin: auto;
               width: 50%;
               padding: 10px;
               font-family: 'Arial Black', Gadget, sans-serif;
               font-size: 30px;
               letter-spacing: 2px;
               word-spacing: 2px;
               color: black;
               font-weight: 900;
               text-align: center;
               border-radius: 15px;
        }
        

    </style>
</head>
<body>

<br>
<h1> NIKI'S LIBRARY</h1>

<div class="container">

    <h3>ADMIN REGISTER FORM</h3>

    <?php if (isset($registrationSuccess)): ?>
        <p style="color: green;">Registration successful! You can now log in as an admin.</p>
    <?php endif; ?>

    <?php if (isset($registrationError)): ?>
        <p style="color: red;"><?php echo $registrationError; ?></p>
    <?php endif; ?>

    <!-- Admin Registration Form -->
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit" name="register">Register</button>
        <a href="login_admin.php" class="btn btn-dark">Login Here</a>
    </form>
</div>

</body>
</html>
