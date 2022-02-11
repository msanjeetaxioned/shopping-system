<?php

$itemsInCart = [];
getCartProductsInfoFromDB();

function getCartProductsInfoFromDB() 
{
    GLOBAL $itemsInCart;
    $cart = json_decode($_COOKIE['cart']);
    $cart = (array) $cart;
    $ids = [];

    DatabaseConnection::startConnection();
    $select = mysqli_query(DatabaseConnection::$conn, "SELECT * FROM Products;");

    $count = mysqli_num_rows($select);
    for($i = 0; $i < $count; $i++) {
        if(isset($cart['cart'.$i])) {
            array_push($ids, ($i + 1));
        } 
    }
    
    for($i = 0; $i < count($ids); $i++) {
        $select = mysqli_query(DatabaseConnection::$conn, "SELECT id,name, price, image_name FROM Products where id=" . $ids[$i] . ";");
        $data = mysqli_fetch_assoc($select);
        array_push($itemsInCart, $data);
    }

    DatabaseConnection::closeDBConnection();
}

function displayCartItems() 
{
    echo "<li class='cart-item'>";
    echo "<span>Name</span>";
    echo "<span>Price</span>";
    echo "<span>Quantity</span>";
    echo "<span>Image</span>";
    echo "<span>Total Price</span>";
    echo "</li>";
    GLOBAL $itemsInCart;
    for($i = 0; $i < count($itemsInCart); $i++) {
        echo "<li class='cart-item'>";
        echo "<h3>" . $itemsInCart[$i]['name'] . "</h3>";
        echo "<span class='price'>&#8377; " . $itemsInCart[$i]['price'] . "</span>";
        echo "<div class='quantity'>
                <input type='number' min='1' max='5' name='quantity$i' value='1'/>
                <span class='hint'>*max. 5 units of any product</span>
            </div>";
        echo "<figure><img src='images/" . $itemsInCart[$i]['image_name'] . "'></figure>";
        echo "<span class='total-price'>" . $itemsInCart[$i]['price'] * (isset($_POST['quantity'.$i]) ? $_POST['quantity'.$i] : 1) . "</span>";
        echo "</li>";
    }
}