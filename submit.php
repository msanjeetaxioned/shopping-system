<?php
if(!isset($_COOKIE["user-data"])) {
    header('Location: http://localhost/php/shopping-system/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Response</title>
    <link rel="stylesheet" href="css/override.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/submit.css">
</head>
<body>
    <?php
    require('utility/submit-response.php');
    ?>
    <header>
        <div class="wrapper">
            <h1>
                <a href="#" title="The Mouse Store">The Mouse Store</a>
            </h1>
        </div>
    </header>
    <div class='wrapper'>
        <div class="submitted-data">
            <h2>User Registered Successfully!</h2>
            <h3>Submitted Data:</h3>
            <p><small>Name: </small><?php echo $name; ?></p>
            <p><small>Mobile Number: </small><?php echo $mobile; ?></p>
            <p><small>Gender: </small><?php echo $gender; ?></p>
        </div>
        <div class="login-div">
            <h2>Login Page</h2>
            <a href="http://localhost/php/shopping-system/login.php" title="Login">Login</a>
        </div>
    </div>
</body>
</html>