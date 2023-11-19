<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Authenticate user (replace with proper authentication logic)
    $username = $_POST['username'];

    // Replace with secure authentication logic
    if ($username ='admin') {
        // Set session for authenticated user (replace with proper session handling)
        session_start();
        $_SESSION['admin'] = ['username' => $username, 'is_admin' => true];

        // Redirect to librarian.php
        header('Location: admin_only.php');
        exit();
    } else {
        $error = "Invalid username";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- Bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

   <!-- Font Awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <br>
   <title>Admin Login</title>
</head>

<body style="background-color: #f8f9fa; color: #343a40;">

   <nav class="navbar navbar-light justify-content-center fs-3 mb-5"  
        style="margin: auto;
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
               border-radius: 15px;">
      NIKI'S LIBRARY
   </nav>

   <div class="container d-flex justify-content-center">
      <form action="" method="post" style="width: 50vw; min-width: 300px; background-color: #ffffff; padding: 20px; border-radius: 15px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">
         <h1 style="font-family: 'Arial Black', Gadget, sans-serif; font-size: 30px; color: #343a40; font-weight: 700; text-align: center;">ADMIN LOGIN FORM</h1>
         <br>
         <?php if (isset($error)): ?>
            <p style="color: red; text-align: center;"><?php echo $error; ?></p>
         <?php endif; ?>
         <div class="row mb-3">
            <div class="col">
               <label class="form-label">USERNAME:</label>
               <input type="text" class="form-control" name="username" style="border-radius: 8px;">
            </div>
            <div class="col">
               <label class="form-label">PASSWORD:</label>
               <input type="password" class="form-control" name="password" style="border-radius: 8px;">
            </div>
         </div>
         <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary" style="border-radius: 8px;">LOGIN</button>
            <a href="index.php" class="btn btn-secondary" style="border-radius: 8px;">CANCEL</a>
         </div>
      </form>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
