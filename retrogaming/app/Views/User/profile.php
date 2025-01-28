<!-------------------------Change Notification----------------------->
<div id="notification" class="notification"></div>

<!----------------------------Title page----------------------------->
<div class="container" style="min-height: 90vh;">

    <!---------------------Profile Summary-------------------------->
    <div class="card border shadow-sm px-3 py-2">
        <h1 class="text-center rounded-3 bg-secondary text-white py-2 mx-auto mb-4 w-75">Bienvenue sur votre profil <?php echo htmlspecialchars($_SESSION['name']); ?></h1><br>
        <div class="card border shadow-sm text-center rounded-3 px-4 px-3">
            <p class="profil profil-text fw-bold text-center mt-2">Votre nom d'utilisateur : <?php echo htmlspecialchars($user['name']); ?></p>
            <p class="profil profil-text fw-bold text-center">Votre adresse email : <?php echo htmlspecialchars($user['email']); ?></p>
        </div>
    </div>

    <!-----------------Change user name or email------------------->
    <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
            <form action="index.php?action=updateProfile" method="POST">
                <div class="card border shadow-sm px-3 py-2">
                    <h2 class="profil-text">Modifier les informations</h2>
                    <div class="card border shadow-sm rounded-3 px-4 px-3">

                        <!-----------------Name--------------->
                        <div class="my-3">
                            <label for="name">Nom :</label>
                            <input type="text" id="name" class="form-control mt-2" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" autocomplete="name" required>
                        </div>

                        <!----------------Email--------------->
                        <div class="mb-3">
                            <label for="email">Email :</label>
                            <input type="email" id="email" class="form-control mt-2" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" autocomplete="email" required>
                        </div>

                        <!----------Validation button-------->
                        <div class="my-4 text-center">
                            <button type="submit" class="btn btn-secondary border-2 border-warning py-2 rounded-5">
                                <i class="fas fa-floppy-disk"></i> Enregistrer les modifications</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <!-----------------Change user password------------------>
    <div class="col-lg-6 col-md-12">
        <form action="index.php?action=updatePassword" method="POST">
            <div class="card border shadow-sm px-3 py-2">
                <h2 class="profil-text">Changer le mot de passe</h2>
                <div class="card border shadow-sm rounded-3 px-4 px-3">

                    <!-----------------------Hidden field for identifier---------------->
                    <input type="text" name="username" autocomplete="username" style="display: none;">

                    <!---------------------Verifying user password---------------------->
                    <div class="my-3">
                        <label for="current_password">Mot de passe actuel :</label>
                        <input type="password" id="current_password" class="form-control mt-2" name="current_password" autocomplete="current-password" required>
                    </div>

                    <!------------------------New user password------------------------>
                    <div class="mb-3">
                        <label for="new_password">Nouveau mot de passe :</label>
                        <input type="password" id="new_password" class="form-control mt-2" name="new_password" autocomplete="new-password" required>
                    </div>

                    <!-----------------Checking the new user password----------------->
                    <div class="mb-3">
                        <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
                        <input type="password" id="confirm_password" class="form-control mt-2" name="confirm_password" autocomplete="new-password" required>
                    </div>

                    <!-----------------------Validation button----------------------->
                    <div class="my-4 text-center">
                        <button type="submit" class="btn btn-secondary border-2 border-warning mb-5 py-2 rounded-5">
                            <i class="fas fa-pen-nib"></i> Changer le mot de passe</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!------------Navigation button------------------>
<div class="text-center">
    <div class="row justify-content-center g-3">

        <!------------Back to list-------------->
        <div class="col-12 col-md-4 col-lg-4">
            <a class="btn btn-primary border-2 border-warning my-5 px-5 py-2 rounded-5" href="<?php echo BASE_URL; ?>public/index.php?action=index>">
                <i class="fas fa-right-from-bracket"></i> Quitter</a>
        </div>
    </div>
</div>
</div>