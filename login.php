<?php 
//start the sessison

session_start();
if (isset($_SESSION['user'])) {
    header("location: dashboard.php");
    // var_dump($_SESSION['user']);
}else{
echo "of";
}
$error_message = '';
if ($_POST) {
    include_once 'database/connexion.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM users WHERE users.email="'.$username .'" AND users.password="'. $password . '" LIMIT 1';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    

    

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
        $_SESSION["user"] = $user;

        // var_dump($_SESSION['user']);
        // var_dump($user);
        // die;
        
        header("location:dashboard.php");
    }else $error_message = "Please make sure that username and password are correct";
    
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS Login - Inventory Management System</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body id="loginBody">

<?php if (!empty($error_message)) {?>
    <div id="errorMessage">
        <p>Error: <?= $error_message ?></p>
    </div>
<?php } ?>
    <div class="container">
        <div class="loginHeader">
            <h1>IMS</h1>
            <p>Inventory Management System</p>
        </div>
        <div class="loginBody">
            <form action="login.php" method="post">
                <div class="loginInputsContainer">
                    <label for="">Username</label>
                    <input placeholder="Username" type="text" name="username" id="">
                </div>
                <div class="loginInputsContainer">
                    <label for="">Password</label>
                    <input  placeholder="Password"type="password" name="password" id="">
                </div>
                <div class="loginButtonContainer">
                    <button>Login</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>