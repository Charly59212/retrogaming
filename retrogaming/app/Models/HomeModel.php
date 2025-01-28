<?php
// HomeModel provides methods for retrieving user information based on their email
class HomeModel {
    private $db;

    // Initialize the database connection
    public function __construct($db) {
        $this->db = $db;
    }

    // Retrieve user details by email
    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }
}
