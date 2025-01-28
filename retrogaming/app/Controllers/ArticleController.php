<?php
// Controller for managing articles in the blog
class ArticleController
{
    private $articleModel;

    // Constructor initializes the articles model with the database connection
    public function __construct($db)
    {
        // Initialize the ArticleModel with the database connection
        $this->articleModel = new ArticleModel($db);
    }

    // Fetches articles of a specific type
    public function getArticlesByType($type)
    {
        // Fetch articles by type from the model
        return $this->articleModel->getArticlesByType($type);
    }

    // Adds a new article with optional image upload
    public function addArticle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Retrieve form data
            $title = $_POST['title'];
            $intro = $_POST['intro'];
            $description = $_POST['description'];
            $type = $_POST['type'];
    
            // Handle image upload
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], '../public/assets/img/' . $image);
            }
    
            // Add the article using the model
            if ($this->articleModel->addArticle($title, $intro, $description, $image, $type)) {
                $_SESSION['successMessage'] = "L'article a été ajouté avec succès.";
            } else {
                $_SESSION['errorMessage'] = "Une erreur est survenue lors de l'ajout de l'article.";
            }
    
            // Redirect to the management page
            header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
            exit;
        }
        // Include the view for adding an article
        include '../app/Views/Admin/addArticle.php';
    }
            
    // Displays the form to edit an article by its ID
    public function editArticle($id)
    {
        // Check if the user is an administrator
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }

        // Retrieve the article with the given ID
        $article = $this->articleModel->getArticleById($id);

        if ($article) {
            // Include the view for editing the article
            include '../app/Views/Admin/editArticle.php';
        } else {
            $_SESSION['errorMessage'] = "Article introuvable.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }
    }

    // Updates an article's details and optional image
    public function updateArticle($id)
    {
        // Check if the user is an administrator
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }
    
        // Retrieve form data
        $title = $_POST['title'];
        $intro = $_POST['intro'];
        $description = $_POST['description'];
        $type = $_POST['type'];
    
        // Check if a new image was uploaded
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../public/assets/img/' . $image);
        } else {
            // Keep the current image if no new image was uploaded
            $image = $_POST['current_image'];
        }
    
        // Update the article in the database
        $this->articleModel->updateArticle($id, $title, $intro, $description, $image, $type);
    
        // Redirect to the articles management page
        $_SESSION['successMessage'] = "Article mis à jour avec succès.";
        header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
        exit;
    }
    
    // Deletes an article based on its ID
    public function deleteArticle()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];

            // Use the existing instance to delete the article
            $result = $this->articleModel->deleteArticle($id);

            if ($result) {
                $_SESSION['successMessage'] = "L'article a été supprimé avec succès.";
            } else {
                $_SESSION['errorMessage'] = "Une erreur est survenue lors de la suppression de l'article.";
            }
        } else {
            $_SESSION['errorMessage'] = "Identifiant invalide.";
        }

        // Redirect to the dashboard
        header("Location: " . BASE_URL . "public/index.php?action=adminDashboard");
        exit;
    }
}
