<?php
class Database
{
    // Database connection properties
    private static $host = "srv1124.hstgr.io";      // Database host
    private static $username = "u632480160_finance"; // Database username
    private static $password = "@Babahelp13";       // Database password
    private static $dbname = "u632480160_finance";   // Database name
    private static $dbConnection = null;            // Database connection instance

    // Create a new connection or return existing one
    public static function getConnection()
    {
        // Check if there's an existing connection
        if (self::$dbConnection == null) {
            // Create a new MySQLi connection
            self::$dbConnection = new mysqli(self::$host, self::$username, self::$password, self::$dbname);

            // Check if connection was successful
            if (self::$dbConnection->connect_error) {
                die('Connection failed: ' . self::$dbConnection->connect_error);
            }
        }
        return self::$dbConnection;
    }

    // Close the connection
    public static function closeConnection()
    {
        if (self::$dbConnection != null) {
            self::$dbConnection->close();
        }
    }
}
?>