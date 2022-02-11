<?php

class ProductsList 
{
    public static $products = array();

    public static function getProductsFromDB() 
    {
        DatabaseConnection::startConnection();
        $select = mysqli_query(DatabaseConnection::$conn, "SELECT * FROM Products;");
    
        $count = mysqli_num_rows($select);
        if($count) {
            for($i = 0; $i < $count; $i++) {
                $data = mysqli_fetch_assoc($select);
                self::$products[$i] = new Product($data['id'], $data['name'], $data['category'], $data['price'], $data['image_name']);
            }
        }
        DatabaseConnection::closeDBConnection();
    }

    public static function displayProducts() 
    {
        for($i = 0; $i < count(self::$products); $i++) {
            echo "<li class='product'>";
            echo "<figure><img src='images/" . self::$products[$i]->imageName . "'></figure>";
            echo "<h3>" . self::$products[$i]->name . "</h3>";
            echo "<span class='price'>&#8377; " . self::$products[$i]->priceOfOne . " each.</span>";
            echo "<div class='quantity'>
            <input type='number' min='1' max='5' name='quantity$i' value='1'/>
            <span class='hint'>*max. 5 units of any product</span>
            </div>";
            echo "<div class='add-to-cart'><input type='checkbox' id='cart$i' name='cart$i' value='yes'>
            <label for='cart$i'>Add to Cart</label></div>";
            echo "</li>";
        }
    }

    public static function gotoCartPage() {
        for($i = 0; $i < count(self::$products); $i++) {
            if(isset($_POST['cart'.$i])) {
                setcookie("cart", json_encode($_POST), time() + 7 * 24 * 60 * 60, "/", "", 0);
                header('Location: http://localhost/php/shopping-system/cart.php');
            }
        }
    }
}