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
    <title>TMS (The Mouse Store)</title>
    <link rel="stylesheet" href="css/override.css">
    <link rel="stylesheet" href="css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php
        require('utility/db-connection.php');
        require('utility/product.php');
        require('utility/product-list.php');
        if(isset($_GET["logout"])) {
            setcookie("email", "", time() - 300, "/", "", 0);
            setcookie("cart", "", time() - 300, "/", "", 0);
            header('Location: http://localhost/php/shopping-system/login.php');
        }
        if(isset($_COOKIE["email"])) {
            ProductsList::getProductsFromDB();
        }
        if(isset($_GET["cart"])) {
            ProductsList::gotoCartPage();
        }
        if(isset($_POST)) {
            ProductsList::gotoCartPage();
        }
    ?>
    <header>
        <div class="wrapper">
            <h1>
                <a href="#" title="The Mouse Store">The Mouse Store</a>
            </h1>
            <div class="control-buttons">
                <div class="cart">
                    <a href="http://localhost/php/shopping-system/home.php?cart=true" title="View Cart">Cart</a>
                    <span>0</span>
                </div>
                <a href="http://localhost/php/shopping-system/home.php?logout=true" title="Logout">Logout</a>
            </div>
        </div>
    </header>
    <form class="container" method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
        <ul class="products-list wrapper">
        <?php
            if(isset($_COOKIE["email"])) {
                ProductsList::displayProducts();
            }
        ?>
        </ul>
        <div class="check-cart submit-div">
            <button type="submit">View Cart</button>
        </div>
    </form>
</body>
</html>