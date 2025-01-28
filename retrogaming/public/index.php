<?php
// Start the session to manage user data across pages
session_start();

// Include required configurations, controllers, and models
require_once '../config/db.php'; // Database connection
require_once '../app/Controllers/HomeController.php'; // Handles authentication and homepage
require_once '../app/Models/HomeModel.php'; // Homepage-related data operations
require_once '../app/Controllers/UserController.php'; // Manages user-related functionalities
require_once '../app/Models/UserModel.php'; // User database interactions
require_once '../app/Controllers/CommentController.php'; // Handles comments
require_once '../app/Models/CommentModel.php'; // Comment database interactions
require_once '../app/Controllers/ArticleController.php'; // Manages articles
require_once '../app/Models/ArticleModel.php'; // Article database operations
require_once '../app/Models/AdminModel.php'; // Admin-specific data operations
require_once '../app/Controllers/AdminController.php'; // Admin-specific functionalities

// Include the header template
include '../templates/header.php';

// Initialize database connection and inject it into controllers
$db = new Db();
$pdo = $db->getConnection();
$homeController = new HomeController($pdo);
$userController = new UserController($pdo);
$commentController = new CommentController($pdo);
$articleController = new ArticleController($pdo);
$adminController = new AdminController($pdo);

// Handle routing based on the 'action' parameter
$action = $_GET['action'] ?? ''; // Default to an empty string if not set

switch ($action) {
    case 'profile':
        $userController->showProfile(); // Display the user's profile
        break;
    case 'updateProfile':
        $userController->updateProfile(); // Update user profile information
        break;
    case 'updatePassword':
        $userController->updatePassword(); // Handle password updates
        break;
    case 'login':
        $homeController->login(); // Handle user login
        break;
    case 'register':
        $homeController->register(); // Handle user registration
        break;
    case 'logout':
        $homeController->logout(); // Handle user logout
        break;
    case 'adminLogin':
        $homeController->adminLogin(); // Admin-specific login
        break;
    case 'adminDashboard':
        $adminController->dashboard(); // Admin dashboard view
        break;
    case 'addArticle':
        $articleController->addArticle(); // Add a new article
        break;
    case 'editArticle':
        $articleController->editArticle($_GET['id']); // Edit an existing article
        break;
    case 'updateArticle':
        $articleController->updateArticle($_GET['id']); // Update an existing article
        break;
    case 'addUser':
        $adminController->addUser(); // Add a new user (admin functionality)
        break;
    case 'deleteUser':
        $adminController->deleteUser(); // Delete a user (admin functionality)
        break;
    case 'editUser':
        $adminController->editUser(); // Edit user information (admin functionality)
        break;
    case 'deleteArticle':
        $articleController->deleteArticle(); // Delete an article
        break;
    case 'viewConsoleArticle':
        // Fetch console-related articles and associated comments
        $articles = $articleController->getArticlesByType('console');
        $articleId = $_GET['id'] ?? 1;
        $comments = $commentController->getComments($articleId);
        include '../app/Views/consoles.php'; // Display console articles
        break;
    case 'viewJeuxArticle':
        // Fetch game-related articles and associated comments
        $articles = $articleController->getArticlesByType('jeu');
        $articleId = $_GET['id'] ?? 2;
        $comments = $commentController->getComments($articleId);
        include '../app/Views/jeux.php'; // Display game articles
        break;
    case 'viewPocketArticle':
        // Fetch pocket-related articles and associated comments
        $articles = $articleController->getArticlesByType('pocket');
        $articleId = $_GET['id'] ?? 3;
        $comments = $commentController->getComments($articleId);
        include '../app/Views/pocket.php'; // Display pocket console articles
        break;
    case 'viewGameplayArticle':
        // Fetch gameplay-related articles and associated comments
        $articles = $articleController->getArticlesByType('gameplay');
        $articleId = $_GET['id'] ?? 4;
        $comments = $commentController->getComments($articleId);
        include '../app/Views/gameplay.php'; // Display gameplay articles
        break;
    case 'addComment':
        $commentController->addComment(); // Add a new comment
        break;
    case 'deleteComment':
        $commentController->deleteComment(); // Delete a comment
        break;
    case 'updateComment':
        $commentController->updateComment(); // Update a comment
        break;
    case 'deleteAdminComment':
        $commentController->deleteAdminComment(); // Delete a comment (admin-only)
        break;
    default:
        $homeController->index(); // Default to the homepage
        break;
}

// Include the footer
include '../templates/footer.php';
