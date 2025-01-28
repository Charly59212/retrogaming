<?php
// Controller for managing admin controls in the blog
class AdminController {
    private $adminModel;
    private $articleModel;
    private $commentModel;
    
    // Constructor initializes the models needed for admin operations
    public function __construct($db) {
        $this->adminModel = new AdminModel($db);
        $this->articleModel = new ArticleModel($db); 
        $this->commentModel = new CommentModel($db);
    }    
    
    // Displays the admin dashboard, accessible only to admins
    public function dashboard() {
        // Check if the user is an admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }    
        
        // Retrieve data for dashboard view
        $users = $this->adminModel->getUsers();
        $articles = $this->articleModel->getAllArticles(); 
        $comments = $this->commentModel->getAllComments();
        
        // Include the dashboard view
        include '../app/Views/Admin/dashboard.php';
    }    
    
    // Alias method for admin dashboard
    public function adminDashboard() {
        // Check if the user is an admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'views/dashboard.php');
            exit;
        }    
        
        // Retrieve data for dashboard view
        $users = $this->adminModel->getUsers();
        $articles = $this->articleModel->getAllArticles(); 
        $comments = $this->commentModel->getAllComments();
        
        // Include the dashboard view
        include '../app/Views/Admin/dashboard.php';
    }    
    
    // Handles adding a new user
    public function addUser() {
        // Check if the user is an admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get user data from the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
           
            // Add user and provide feedback
            if ($this->adminModel->addUser($name, $email, $password, $role)) {
                $_SESSION['successMessage'] = "Utilisateur ajouté avec succès.";
            } else {
                $_SESSION['errorMessage'] = "Échec de l'ajout de l'utilisateur.";
            }
            header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
            exit;
        } else {
            // Show the form to add a user
            include '../app/Views/Admin/addUser.php';
        }
    }
    
    // Handles deleting a user
    public function deleteUser() {
        // Check if the user is an admin
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }    
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the user ID to delete
            $id = (int) $_POST['id'];

            // Delete user and provide feedback
            if ($this->adminModel->deleteUser($id)) {
                $_SESSION['successMessage'] = "Utilisateur supprimé avec succès.";
            } else {
                $_SESSION['errorMessage'] = "Échec de la suppression de l'utilisateur.";
            }    
        }    
        header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
        exit;
    }    
        
    // Handles editing a user's information
    public function editUser() {
        // Check if the user is an admin
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        $_SESSION['errorMessage'] = "Accès refusé.";
        header('Location: ' . BASE_URL . 'public/index.php');
        exit;
    }    

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get updated user data from the form
        $id = (int) $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        // Update user and provide feedback
        if ($this->adminModel->updateUser($id, $name, $email, $role)) {
            $_SESSION['successMessage'] = "Utilisateur modifié avec succès.";
        } else {
            $_SESSION['errorMessage'] = "Échec de la modification de l'utilisateur.";
        }    
        header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
        exit;
    } else {
        // Retrieve user data for the edit form
        $id = (int) $_GET['id'];
        $user = $this->adminModel->getUserById($id); 
        include '../app/Views/Admin/editUser.php'; 
    }    
}    

}
