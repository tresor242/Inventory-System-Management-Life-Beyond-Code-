<?php 

session_start();
if (isset($_SESSION['user'])) {
   header("location: dashboard.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS Homepage - Inventory Management System</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Connectez-vous !</h1>
    <a href="login.php">Se Connecter</a>
</body>
</html>