<?php
// Connect to the database
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

  <title>index php</title>
</head>
<br>
<body style="background-color: #E1C78F">
<nav class="navbar navbar-light justify-content-center fs-3 mb-5"
         style=" margin: auto;
                width: 50%;
                border: 3px solid black;
                padding: 10px;
                font-family: Lucida Sans Unicode, Lucida Grande;
               font-size: 25px;
               letter-spacing: 2px;
               word-spacing: 2px;
               color:  white;
               font-weight: 900;
               text-align: center;"
               >
      NIKI'S LIBRARY
   </nav>
<body>
  <tbody>
    <a href="login_user.php" class="btn btn-dark mb-3">Log Out</a>
    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Entry Number</th>
          <th scope="col">Book Name</th>
          <th scope="col">Author</th>
          <th scope="col">Publisher</th>
          <th scope="col">ISBN Number</th>
          <th scope="col">Version</th>  
          <th scope="col">Shelf</th>
        </tr>
      </thead>
      <?php
    // Fetch and display list of books
    $stmt = $pdo->query("SELECT * FROM books");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["entry_number"] ?></td>
            <td><?php echo $row["book_name"] ?></td>
            <td><?php echo $row["author"] ?></td>
            <td><?php echo $row["publisher"] ?></td>
            <td><?php echo $row["isbn_number"] ?></td>
            <td><?php echo $row["version"] ?></td>
            <td><?php echo $row["shelf"] ?></td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</body>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        background-color: white;
        margin: 20px auto; /* Set margin to auto for horizontal centering and add space on top and bottom */
        padding: 20px;
    }
    body
    {
      margin-left: 50px;
      margin-right: 50px;
    }
</style>

</body>

</html>