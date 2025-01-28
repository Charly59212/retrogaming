<?php
// AdminModel handles CRUD operations for managing users in the database
class AdminModel {
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db) {
        $this->db = $db;
    }

    // Retrieves a user by their ID
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }    

    // Retrieves all users from the database, ordered by ID
    public function getUsers() {
        $stmt = $this->db->query("SELECT * FROM users ORDER BY id ASC"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Adds a new user to the database
    public function addUser($name, $email, $password, $role) {
        // Check if the user already exists based on their email
        $stmt = $this->db->prepare('SELECT id FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        if ($stmt->fetch()) {
            // Return false if the user already exists
            return false;
        }
    
        // Insert a new user into the database
        $stmt = $this->db->prepare('INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)');
        return $stmt->execute(['name' => $name, 'email' => $email, 'password' => $password, 'role' => $role]);
    }
    
    // Updates an existing user's information
    public function updateUser($id, $name, $email, $role) {
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ?, role = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $role, $id]);
    }

    // Deletes a user from the database by their ID
    public function deleteUser($id) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
