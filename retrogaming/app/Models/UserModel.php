<?php
// UserModel handles CRUD operations and profile management for users
class UserModel
{
    private $db;

    // Initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Retrieve user details by email
    public function getUserByEmail($email)
    {
        $query = $this->db->prepare('SELECT id, name, email, password, role FROM users WHERE email = :email');
        $query->execute(['email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Retrieve user details by name
    public function getUserByName($name)
    {
        $query = $this->db->prepare('SELECT name, email FROM users WHERE name = :name');
        $query->execute(['name' => $name]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Update the user's profile information (name and email)
    public function updateProfile($userName, $newName, $newEmail)
    {
        $query = $this->db->prepare('UPDATE users SET name = :newName, email = :newEmail WHERE name = :userName');
        return $query->execute([
            'newName' => $newName,
            'newEmail' => $newEmail,
            'userName' => $userName
        ]);
    }

    // Update the user's password
    public function updatePassword($userName, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
        $query = $this->db->prepare('UPDATE users SET password = :password WHERE name = :name');
        return $query->execute([
            'password' => $hashedPassword,
            'name' => $userName
        ]);
    }

    // Verify the user's password for authentication
    public function verifyPassword($userName, $password)
    {
        $query = $this->db->prepare('SELECT password FROM users WHERE name = :name');
        $query->execute(['name' => $userName]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['password']);
    }
}
