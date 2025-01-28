<?php
// Controller responsible for handling user profile-related actions.
class UserController {
    private $userModel;

    // Constructor initializes the user model with the database connection
    public function __construct($db) {
        $this->userModel = new UserModel($db);
    }

    // Displays the user's profile page if the user is logged in
    public function showProfile() {
        // Redirect to home page if the user is not logged in
        if (!isset($_SESSION['name'])) {
            header("Location: index.php");
            exit;
        }

        // Fetch the user's details by their session name
        $user = $this->userModel->getUserByName($_SESSION['name']);
        if (!$user) {
            // Error handling if the user is not found in the database
            die("Utilisateur introuvable.");
        }

        // Include the profile view to display the user's data
        include '../app/Views/User/profile.php';
    }

    // Updates the user's profile (name and email)
    public function updateProfile() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userName = $_SESSION['name']; // Get the current logged-in user's name
            $newName = trim($_POST['name']); // Get the new name from the form
            $newEmail = trim($_POST['email']); // Get the new email from the form

            // Check that both the name and email are not empty
            if (!empty($newName) && !empty($newEmail)) {
                // Try to update the user's profile in the database
                if ($this->userModel->updateProfile($userName, $newName, $newEmail)) {
                    $_SESSION['name'] = $newName; // Update the session with the new name
                    header('Location: index.php?action=profile&success=1'); 
                } else {
                    header('Location: index.php?action=profile&error=update_failed'); 
                }
            } else {
                header('Location: index.php?action=profile&error=empty_fields'); 
            }
            exit;
        }
    }

    // Updates the user's password
    public function updatePassword() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userName = $_SESSION['name']; // Get the current logged-in user's name
            $currentPassword = trim($_POST['current_password']); // Get the current password from the form
            $newPassword = trim($_POST['new_password']); // Get the new password from the form
            $confirmPassword = trim($_POST['confirm_password']); // Get the confirmation of the new password

            // Ensure that all password fields are filled and the new password matches the confirmation
            if (!empty($currentPassword) && !empty($newPassword) && $newPassword === $confirmPassword) {
                // Verify the current password with the one stored in the database
                if ($this->userModel->verifyPassword($userName, $currentPassword)) {
                    // Update the password if the current password is correct
                    if ($this->userModel->updatePassword($userName, $newPassword)) {
                        header('Location: index.php?action=profile&success=1'); 
                    } else {
                        header('Location: index.php?action=profile&error=update_failed'); 
                    }
                } else {
                    header('Location: index.php?action=profile&error=incorrect_password'); 
                }
            } else {
                header('Location: index.php?action=profile&error=password_error'); 
            }
            exit;
        }
    }
    
}
