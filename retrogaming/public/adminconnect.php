<?php
// Start the session to manage user data across pages
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----------Site Title------------>
    <title>Blog Rétrogaming</title>

    <!---------Fonts Google----------->
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Orbitron:wght@400..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&display=swap" rel="stylesheet">

    <!--------Bootstrap Links-------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--------CDN Fontawesom-------->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-------Style css Pages------->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/styleblog.css">

    <!--------Gamepad Favicon------->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/gamepad.png">
</head>

<body>

    <!------------------------Title site width logo------------------------------>
    <header>
        <div class="my-3 text-center fw-bold fs-4">
            <a><i class="me-2 fa-solid fa-headset"></i>Rétrogaming</a>
        </div>
    </header>

    <main>
        <!---------------------Main section of the page--------------------------->
        <div class="container pt-5" style="min-height: 80vh;">
            <div class="card border shadow-sm text-center rounded-3 px-4">

                <!---------------------------Title-------------------------------->
                <h1 class="center rounded-3 bg-secondary text-white py-2 my-3">Espace Administrateur</h1>
                <div class="card border shadow-sm text-center rounded-3 px-4">

                    <!-------------------If user is not connected------------------->
                    <?php if (!isset($_SESSION['name'])) : ?>

                        <!---------------Displaying success or error messages-------------->
                        <div class="d-flex justify-content-center mt-3">
                            <?php
                            // Retrieving session messages success and error
                            $error = $_SESSION['errorMessage'] ?? null;

                            // If a success message is present, it is displayed in a green alert
                            if ($error): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?= htmlspecialchars($error); ?>

                                    <!-----Button to close the alert----->
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php unset($_SESSION['errorMessage']);
                                ?>
                            <?php endif; ?>
                        </div>

                        <!----------------Left column: Connection------------------->
                        <div class="row">
                            <div class="col-12 mt-3">
                                <div class="card shadow-sm pt-1 text-center bg-secondary-subtle">

                                    <!-----------------Titled--------------->
                                    <form action="index.php?action=adminLogin" method="POST" class="border pb-2 px-4 rounded shadow-sm bg-secondary-subtle">

                                        <!-------------Email---------------->
                                        <div class="email">
                                            <label for="login-email" class="form-label">Email :</label>
                                            <input type="email" id="login-email" name="email" class="form-control" autocomplete="username" required>
                                        </div>

                                        <!------------Password------------->
                                        <div class="password">
                                            <label for="login-password" class="form-label">Mot de passe :</label>
                                            <input type="password" id="login-password" name="password" class="form-control" autocomplete="current-password" required>
                                        </div>

                                        <!----------Login button---------->
                                        <button type="submit" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5">
                                            <i class="fas fa-user-plus me-2"></i>Se connecter
                                        </button>
                                    </form>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        </div>
    </main>

    <!----------------Footer------------->
    <footer>
        <div class="d-flex justify-content-center">
            <div class="retro text-center mt-1">
                <span>&copy; Mon Blog RetroGaming - 2025</span><br>
                <span> Tous droits Réservés.</span>
            </div>
        </div>
    </footer>

    <script>
        /*-----Bootstrap Messages-----*/
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(alert => alert.remove());
        }, 3000); // Deletes alerts after 3 seconds
    </script>
</body>