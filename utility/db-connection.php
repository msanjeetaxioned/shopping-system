<?php

class DatabaseConnection 
{
    private static $servername = "localhost";
    private static $databaseUsername = "root";
    private static $databasePassword = "";
    private static $databaseName = "shopping-system";
    public static $conn;

    // Creating connection
    public static function startConnection() 
    {
        self::$conn = mysqli_connect(self::$servername, self::$databaseUsername, self::$databasePassword, self::$databaseName);

        if (self::$conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }

    public static function closeDBConnection() 
    {
        // Close connection
        mysqli_close(self::$conn);
    }
}