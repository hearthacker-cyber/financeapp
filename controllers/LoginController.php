<?php

class LoginController
{
    public function login($email, $password)
    {
        // Connect to the database
        $db = new Database();
        $conn = $db->connect();

        // Check if the email exists in the database
        $sql = "SELECT id, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $hashed_password);
            $stmt->fetch();

            // Verify password
            if (password_verify($password, $hashed_password)) {
                // Return true if login is successful
                return true;
            } else {
                // Return error message if password is incorrect
                return "Incorrect password.";
            }
        } else {
            // Return error message if email doesn't exist
            return "No user found with that email address.";
        }
    }
}