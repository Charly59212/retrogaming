<?php
// Controller responsible for handling the home page, user authentication, and registration
class HomeController
{
    private $db;
    private $homeModel;

    // Constructor initializes the database connection and home model
    public function __construct($db)
    {
        $this->db = $db;
        $this->homeModel = new HomeModel($db);
    }

    // Renders the home page view
    public function index()
    {
        include '../app/Views/Home/index.php';
    }

    // Handles user login by verifying email and password
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Fetch user data by email
            $user = $this->homeModel->getUserByEmail($email);

            // Verify the password against the stored hash
            if ($user && password_verify($password, $user['password'])) {
                // Set session variables if login is successful
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];
                $_SESSION['successMessage'] = "Connexion réussie !";
                header('Location: index.php'); // Redirect to the home page after successful login
                exit;
            } else {
                // Display error message if login fails
                $_SESSION['errorMessage'] = "Mauvais Email ou Mot de Passe.";
                header('Location: index.php');
                exit;
            }
        }
    }

    // Handles user registration by creating a new account
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate that no field is empty
            if (empty($name) || empty($email) || empty($password)) {
                $_SESSION['errorMessage'] = "Tous les champs sont obligatoires.";
                header('Location: index.php');
                exit;
            }

            try {
                // Hash the password before storing it
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insert the new user into the database
                $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
                $stmt->execute([$name, $email, $hashedPassword]);

                // Provide success feedback to the user
                $_SESSION['successMessage'] = "Inscription réussie ! Vous pouvez vous connecter.";
                header('Location: index.php');
                exit;
            } catch (PDOException $e) {
                // Handle errors related to database constraints, like duplicate emails
                if ($e->getCode() == 23000) {
                    $_SESSION['errorMessage'] = "Email ou nom déjà utilisé. Veuillez en choisir un autre svp.";
                } else {
                    $_SESSION['errorMessage'] = "Une erreur s'est produite. Veuillez réessayer.";
                }
                header('Location: index.php');
                exit;
            }
        }
    }

    // Disconnection method
    public function logout()
    {
        session_start();
        session_unset(); 
        session_destroy(); 
 
        header('Location: index.php'); 
        exit();
    }

    // Handles admin login with additional role validation for access control
    public function adminLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Fetch user data by email
            $user = $this->homeModel->getUserByEmail($email);

            // Check if the user exists and the password matches. Also, ensure the user is an admin
            if ($user && password_verify($password, $user['password']) && $user['role'] === 'admin') {
                // Set session variables if admin login is successful
                $_SESSION['name'] = $user['name'];
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $user['role'];
                $_SESSION['successMessage'] = "Connexion administrateur réussie !";

                // Redirect to the admin dashboard page
                header('Location: ../public/tableau-de-bord-admin.php');
                exit;
            } else {
                // Display error message if login fails or the user is not an admin
                $_SESSION['errorMessage'] = "Identifiants incorrects ou accès non autorisé.";
                header('Location: adminconnect.php');
                exit;
            }
        }
    }
}
