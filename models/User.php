<?php
class User
{
    private $db;

    public function __construct()
    {
        // Initialize database connection
        $this->db = Database::getConnection();
    }

    // Method to check if the user exists and the password is correct
    public function login($email, $password)
    {
        // Sanitize input to prevent SQL injection
        $email = $this->db->real_escape_string($email);

        // Query to find the user by email
        $query = "SELECT * FROM users WHERE email = '$email'";

        // Execute the query
        $result = $this->db->query($query);

        // Check if the user exists
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if the password matches (assuming hashed passwords)
            if (password_verify($password, $user['password'])) {
                // Return user data on successful login
                return $user;
            }
        }

        // Return false if login fails (invalid email or password)
        return false;
    }

    // Close the database connection when done
    public function __destruct()
    {
        Database::closeConnection();
    }
}
?>