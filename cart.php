<?php
    if(!isset($_COOKIE["email"])) {
        header('Location: http://localhost/php/shopping-system/login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMS (The Mouse Store) Cart</title>
    <link rel="stylesheet" href="css/override.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
</head>
<body>
    <?php 
    require('utility/db-connection.php');
    require('utility/cart-items.php');
    if(isset($_GET["logout"])) {
        setcookie("email", "", time() - 300, "/", "", 0);
        setcookie("cart", "", time() - 300, "/", "", 0);
        header('Location: http://localhost/php/shopping-system/login.php');
    }
    ?>
    <header>
        <div class="wrapper">
            <h1>
                <a href="#" title="The Mouse Store">The Mouse Store</a>
            </h1>
            <div class="control-buttons">
                <a href="http://localhost/php/shopping-system/home.php?logout=true" title="Logout">Logout</a>
            </div>
        </div>
    </header>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="wrapper">
        <ul class="cart-items">
            <?php displayCartItems(); ?>
        </ul>
        <div class="place-order-div submit-div">
            <button type="submit">place order</button>
        </div>
    </form>
</body>
</html>