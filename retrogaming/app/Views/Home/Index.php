<main>
    <!-----------------------Main section of the home page-------------------------->
    <div class="container">
        <div class="card border shadow-sm text-center rounded-3 px-4 px-3">

            <!---------------------------------Tilte page--------------------------->
            <h1 class="center rounded-3 bg-secondary text-white py-2 my-3">Le blog sur l'univers du rétrogaming</h1>
            <div class="card border shadow-sm text-center rounded-3 px-4 px-3">

                <!----------------------------Introduction-------------------------->
                <p class="lead fw-bold my-3">Découvrez un contenu incroyable sur les consoles de jeux rétro et les classiques.</p>
                <p class="intro fw-bold mb-3">Bien que de nouveaux jeux vidéo innovants sortent chaque année, il existe de plus en plus des fans inconditionnels du rétrogaming.
                    Le temps passe, les jeunes gamers d’hier sont devenus les adultes d’aujourd’hui. A chacun sa propre définition du rétro mais avec plus de 50 ans d’histoire des jeux vidéos,
                    le nombre de génération touché commence à être important. Si vous êtes vous aussi fan de retro-games, ce blog est fait pour vous !</p>
            </div>

            <!----------------------If user is not connected--------------------->
            <?php if (!isset($_SESSION['name'])) : ?>

                <!---------------Displaying success or error messages-------------->
                <div class="d-flex justify-content-center">
                    <?php
                    // Retrieving session messages success and error
                    $success = $_SESSION['successMessage'] ?? null; // Message de succès
                    $error = $_SESSION['errorMessage'] ?? null; // Message d'erreur

                    // If a success message is present, it is displayed in a green alert
                    if ($success): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($success); ?>

                            <!-------------Button to close the alert-------------->
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['successMessage']);
                        ?>
                    <?php endif; ?>

                    <!------If an error message is present, it is displayed in a red alert------>
                    <?php if ($error): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= htmlspecialchars($error); ?>

                            <!-----------Button to close the alert------------>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['errorMessage']);
                        ?>
                    <?php endif; ?>
                </div>

                <!-------------------Left column: Connection--------------------->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-sm pt-1 mx-4 text-center bg-secondary-subtle">
                            <!------------------Titled---------------->
                            <h3>Déjà inscrit ?</h3>
                            <h4 class="card-text">Accédez à votre espace personnel.</h4>
                            <form action="index.php?action=login" method="POST" class="border pb-2 px-4 rounded shadow-sm bg-secondary-subtle">

                                <!--------------Email---------------->
                                <div class="email">
                                    <label for="login-email" class="form-label">Email :</label>
                                    <input type="email" id="login-email" name="email" class="form-control" autocomplete="username" required>
                                </div>

                                <!-------------Password------------->
                                <div class="password">
                                    <label for="login-password" class="form-label">Mot de passe :</label>
                                    <input type="password" id="login-password" name="password" class="form-control" autocomplete="current-password" required>
                                </div>

                                <!----------Login button----------->
                                <button type="submit" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5">
                                    <i class="fas fa-user-plus me-2"></i>Se connecter
                                </button>
                            </form>
                        </div>
                    </div>

                    <!----------------Right column: Registration--------------->
                    <div class="col-md-6">
                        <div class="card shadow pt-1 mx-4 text-center bg-secondary-subtle">

                            <!-----------------Titled--------------->
                            <h3>Nouveau sur notre site ?</h3>
                            <h4 class="card-text">Créez un compte.</h4>
                            <form class="border pb-2 px-4 rounded shadow-sm bg-secondary-subtle" action="index.php?action=register" method="POST">

                                <!-------------Nom----------------->
                                <div class="name">
                                    <label for="register-name" class="form-label">Nom d'utilisateur :</label>
                                    <input type="text" id="register-name" name="name" class="form-control" autocomplete="name" required>
                                </div>

                                <!-------------Email---------------->
                                <div class="regster mb-1">
                                    <label for="register-email" class="form-label mt-1">Email :</label>
                                    <input type="email" id="register-email" name="email" class="form-control" autocomplete="email" required>
                                </div>

                                <!-------------Password------------->
                                <div class="pass mb-2">
                                    <label for="register-password" class="form-label">Mot de passe :</label>
                                    <input type="password" id="register-password" name="password" class="form-control" autocomplete="new-password" required>
                                </div>

                                <!-----------Login button----------->
                                <button type="submit" class="btn btn-primary border-2 border-warning mt-2 mb-2 px-4 py-2 rounded-5">
                                    <i class="fas fa-pen-nib me-2"></i>Créer un compte
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php else : ?>
        </div>

        <!---------------Displaying success or error messages-------------->
        <div class="d-flex justify-content-center mt-3">
            <?php
                // Retrieving session messages success and error
                $success = $_SESSION['successMessage'] ?? null; // Message de succès
                $error = $_SESSION['errorMessage'] ?? null; // Message d'erreur

                // If a success message is present, it is displayed in a green alert
                if ($success): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($success); ?>

                    <!-------------Button to close the alert-------------->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['successMessage']);
                ?>
            <?php endif; ?>

            <!------If an error message is present, it is displayed in a red alert------>
            <?php if ($error): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= htmlspecialchars($error); ?>

                    <!-----------Button to close the alert------------>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['errorMessage']);
                ?>
            <?php endif; ?>
        </div>

        <div class="card border shadow-sm text-center rounded-3 px-4 px-3">

            <!--------------------If the user is logged in-------------------->
            <div class="card border shadow-sm text-center rounded-3 px-4 px-3">

                <!--------------------User welcome message-------------------->
                <h2 id="pseudo" class="text-center rounded-3 bg-secondary-subtle pb-2 pt-1 w-75 py-2 mx-auto mt-3">Bienvenue sur votre espace personnel <?= htmlspecialchars($_SESSION['name']); ?></h2>

                <p class="intro fw-bold mt-2 px-2 text-center">Tous les jours, découvrez de nouveaux articles sur les consoles et jeux de l'époque du début du jeu vidéo ! <br>
                    Et si vous souhaitez voir le contenu de ce blog s'enrichir et aussi en découvrir davantage... <br>...N'hésitez pas à nous donner votre avis en ajoutant un commentaire.</p>

                <!-------------Navigation buttons---------------->
                <div class="text-center my-3">
                    <div class="row justify-content-center g-3">

                        <!---------List of consoles------------>
                        <div class="col-12 col-md-6 col-lg-3">
                            <a class="btn btn-secondary border-2 w-75 rounded-5 border-warning" href="<?php echo BASE_URL; ?>public/index.php?action=viewConsoleArticle&id=1" ?>
                                <i class="me-2 py-2 fas fa-solid fa-gamepad"></i>Consoles</a>
                        </div>

                        <!----------List of games------------->
                        <div class="col-12 col-md-6 col-lg-3">
                            <a class="btn btn-primary border-2 w-75 rounded-5 border-warning" href="<?php echo BASE_URL; ?>public/index.php?action=viewJeuxArticle&id=2" ?>
                                <i class="me-2 py-2 fas fa-solid fa-chess-queen"></i>Jeux</a>
                            </a>
                        </div>

                        <!----List of portable consoles------>
                        <div class="col-12 col-md-6 col-lg-3">
                            <a class="btn btn-success border-2 w-75 rounded-5 border-warning" href="<?php echo BASE_URL; ?>public/index.php?action=viewPocketArticle&id=3" ?>
                                <i class="me-2 py-2 fa-solid fa-puzzle-piece"></i>Pocket</a>
                            </a>
                        </div>

                        <!-------------Gameplay------------->
                        <div class="col-12 col-md-6 col-lg-3">
                            <a class="btn btn-dark border-2 w-75 rounded-5 border-warning" href="<?php echo BASE_URL; ?>public/index.php?action=viewGameplayArticle&id=4" ?>
                                <i class="me-2 py-2 fa-solid fa-vr-cardboard"></i>GamePlay</a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border shadow-sm text-center rounded-3 px-3">

                <!---------------Title of section for user management----------------->
                <h2 id="pseudo" class="text-center rounded-3 bg-secondary-subtle px-4 w-75 pb-2 pt-1 mx-auto my-3">Gestion de votre espace personnel</h2>

                <!---------------Personal Space Buttons------------------>
                <div class="text-center my-3">
                    <div class="row justify-content-center g-3">

                        <!-----------Profile management-------------->
                        <div class="col-12 col-md-6 col-lg-3">
                            <a class="btn btn-secondary border-2 w-75 rounded-5 border-warning" href="index.php?action=profile">
                                <i class="me-2 py-2 fa-solid fa-user"></i>Profil</a>

                        </div>

                        <!----------------Disconnect---------------->
                        <div class="col-12 col-md-6 col-lg-3">
                            <a class="btn btn-danger border-2 w-75 rounded-5 border-warning" href="index.php?action=logout">
                                <i class="me-2 py-2 fas fa-solid fa-cloud-arrow-down"></i>Déconnexion</a>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!----------------------Administrator Panel----------------------->
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') : ?>
                <div>
                    <div class="card border shadow-sm text-center rounded-3 px-3">

                        <!----Title of section for administrator management------>
                        <h2 id="pseudo" class="text-center rounded-3 bg-secondary-subtle px-4 w-75 pb-2 pt-1 mx-auto my-3">Panneau d'administration</h2>

                        <!-----------Administration management-------------->
                        <div class="col-12 col-md-6 col-lg-3 my-3 mx-auto">
                            <a class="btn btn-primary border-2 w-75 rounded-5 border-warning" href="<?php echo BASE_URL; ?>public/index.php?action=adminDashboard">
                                <i class="me-2 py-2 fa-solid fa-screwdriver-wrench"></i>Administration</a>
                            -
                        </div>
                    </div>
                </div>
            <?php endif; ?>

        <?php endif; ?>
        </div>

        <!--------------------------------Page content------------------------>
        <div class="card border shadow-sm text-center rounded-3 px-4 px-3">

            <!----------------------------Page title-------------------------->
            <h1 class="center rounded-3 bg-secondary text-white py-2 mt-3">Les consoles et jeux cultes !</h1>
            <div class="gallery">

                <!------First article------>
                <div class="modele card shadow-sm border-3 border border-secondary pt-2 px-2 my-3 rounded-4">
                    <img src="<?php echo BASE_URL; ?>public/assets/img/Snes.jpg" alt="Super Nintendo" title="Super Nintendo">
                    <p class="autonom mt-4">Super Nintendo</p>
                    <p>La Super NES sort le mercredi 21 novembre 1990 pour un prix de 1300 francs de l'époque. C'est un succès immédiat ! la livraison initiale de 300 000 unités est vendue en quelques heures et le dérangement occasionné conduit le gouvernement japonais à demander aux fabricants de consoles de jeux vidéo de prévoir, de sortir leurs consoles en fin de semaine.</p>
                </div>

                <!------Second article------>
                <div class="modele card shadow-sm border-3 border border-secondary pt-2 px-2 my-3 rounded-4">
                    <img src="<?php echo BASE_URL; ?>public/assets/img/SF2.jpg" alt="Street Fighter 2" title="Street Fighter 2">
                    <p class="autonom mt-4">Street Fighter 2</p>
                    <p>Street Fighter 2 est un jeu vidéo de combat développé et édité par Capcom, sorti en 1991 et sujet à un très grand nombre d'adaptations, y compris sur les téléphones Blackberry. Le jeu fait s'affronter plusieurs personnages dans des combats en un-contre-un. Le premier joueur mettant KO son adversaire par deux fois sort victorieux du combat.</p>
                </div>

                <!------Third article------>
                <div class="modele card shadow-sm border-3 border border-secondary pt-2 px-2 my-3 rounded-4">
                    <img src="<?php echo BASE_URL; ?>public/assets/img/Mdrive.jpg" alt="La Mega Drive" title="La Mega Drive">
                    <p class="autonom mt-4">La Mega Drive</p>
                    <p>La version européenne de la console sort le 30 novembre 1990, composée de l'offre groupée comprenant le jeu Altered Beast. Elle est mise en vente à 1900 francs de l'époque. S'appuyant sur le succès de la Master System, la Mega Drive devient la console la plus populaire en Europe, et plus de jeux sont disponibles lors de sa mise sur le marché par rapport aux autres.</p>
                </div>

                <!------Fourth article------>
                <div class="modele card shadow-sm border-3 border border-secondary pt-2 px-2 my-3 rounded-4">
                    <img src="<?php echo BASE_URL; ?>public/assets/img/FF7.jpg" alt="Final Fantasy" title="Final Fantasy">
                    <p class="autonom mt-4">Final Fantasy</p>
                    <p>Final Fantasy est un jeu vidéo de rôle développé par Square sous la direction de Yoshinori Kitase et sorti en 1997, constituant le septième opus de la série Final Fantasy. Premier jeu de la série à être produit pour la console Sony PlayStation ainsi que pour les ordinateurs sous Windows, c’est aussi le premier Final Fantasy à utiliser des graphismes en 3D.</p>
                </div>
            </div>
        </div>
    </div>
</main>