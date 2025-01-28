<?php
// Controller for managing comments in the blog
class CommentController
{
    private $commentModel;

    // Constructor initializes the comments model with the database connection
    public function __construct($db)
    {
        $this->commentModel = new CommentModel($db);
    }

    // Fetches all comments for a specific article
    public function getComments($articleId)
    {
        return $this->commentModel->getComments($articleId);
    }

    // Adds a new comment for an article if the user is logged in
    public function addComment()
    {
        // Process form submission and verify that the user is logged in
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['name'])) {
            $articleId = $_POST['article_id'];
            $content = $_POST['content'];
            $rating = $_POST['rating'];
            $userName = $_SESSION['name'];
            $action = $_POST['action'];

            // Call the model to add the comment
            if ($this->commentModel->addComment($articleId, $userName, $content, $rating)) {
                $_SESSION['successMessage'] = "Votre commentaire a été ajouté avec succès.";
            } else {
                $_SESSION['errorMessage'] = "Vous avez déjà commenté cet article.";
            }

            // Redirect to the article page
            header("Location: " . BASE_URL . "public/index.php?action=$action&id=" . $articleId);
            exit;
        }
    }

    // Deletes a user's comment on an article
    public function deleteComment()
    {
        // Process deletion only if the user is logged in
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['name'])) {
            $commentId = $_POST['comment_id'];
            $articleId = $_POST['article_id'];
            $userName = $_SESSION['name'];
            $action = $_POST['action'];

            // Call the model to delete the comment
            if ($this->commentModel->deleteComment($commentId, $userName)) {
                $_SESSION['successMessage'] = "Votre commentaire a bien été supprimé.";
                header("Location: " . BASE_URL . "public/index.php?action=$action&id=" . $articleId);
                exit;
            } else {
                header("Location: " . BASE_URL . "public/index.php?action=$action&id=" . $articleId . "&error=delete_failed");
                exit;
            }
        }
    }

    // Displays all comments for the admin dashboard
    public function viewComments()
    {
        // Restrict access to administrators only
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }

        // Fetch all comments from the database
        $comments = $this->commentModel->getAllComments();

        // Load the admin dashboard view with the comments
        include '../app/Views/Admin/dashboard.php';
    }

    // Deletes a specific comment from the admin dashboard
    public function deleteAdminComment()
    {
        // Ensure only administrators can perform this action
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            $_SESSION['errorMessage'] = "Accès refusé.";
            header('Location: ' . BASE_URL . 'public/index.php');
            exit;
        }

        // Check if a comment ID is provided for deletion
        if (isset($_GET['id'])) {
            $commentId = $_GET['id'];

            // Call the model to delete the comment
            if ($this->commentModel->deleteAdminComment($commentId)) {
                $_SESSION['successMessage'] = "Commentaire supprimé avec succès.";
            } else {
                $_SESSION['errorMessage'] = "Erreur lors de la suppression du commentaire.";
            }

            // Redirect to the admin dashboard after deletion
            header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
            exit;
        } else {
            $_SESSION['errorMessage'] = "Aucun commentaire spécifié pour suppression.";
            header('Location: ' . BASE_URL . 'public/index.php?action=viewComments');
            exit;
        }
    }

    // Updates a comment's content and rating from the admin dashboard
    public function updateComment()
    {
        // Handle the update request via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $content = trim($_POST['content']);
            $rating = isset($_POST['rating']) ? (int)$_POST['rating'] : null;

            // Validate the input
            if (empty($content)) {
                $_SESSION['errorMessage'] = "Le contenu du commentaire ne peut pas être vide.";
            } else {
                // Update the comment using the model
                $success = $this->commentModel->updateComment($id, $content, $rating);

                if ($success) {
                    $_SESSION['successMessage'] = "Commentaire modifié avec succès.";
                } else {
                    $_SESSION['errorMessage'] = "Une erreur s'est produite lors de la modification du commentaire.";
                }
            }

            // Redirect to the admin dashboard
            header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
            exit;
        } else {
            $_SESSION['errorMessage'] = "Méthode non autorisée.";
            header('Location: ' . BASE_URL . 'public/index.php?action=adminDashboard');
            exit;
        }
    }
}
