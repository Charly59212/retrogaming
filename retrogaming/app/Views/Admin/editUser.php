<main>
    <div class="container">
        <!------------Card container for user modification---------->
        <div class="card border shadow-sm rounded-3 px-2 py-2">

            <!------------------Header for the page---------------->
            <h1 class="text-center rounded-3 bg-secondary text-white py-2 mx-auto w-100">Modifier les informations d'un utilisateur</h1>

            <!---------------Form card for user information-------->
            <div class="card border shadow-sm rounded-3 px-4 py-3">
                <form action="?action=editUser" method="POST">
                    <!--Hidden input to pass the user ID securely-->
                    <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

                    <!-------------Input for user name------------>
                    <div class="form-group mb-3">
                        <label for="name">Nom :</label>
                        <input type="text" class="form-control mt-2" id="name" name="name" autocomplete="name" value="<?= htmlspecialchars($user['name']) ?>" required>
                    </div>

                    <!------------Input for user email------------>
                    <div class="form-group mb-3">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control mt-2" id="email" name="email" autocomplete="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    </div>

                    <!-----Dropdown to select the user's role----->
                    <div class="form-group mb-3">
                        <label for="role">Rôle :</label>
                        <select id="role" class="form-control mt-2" name="role" required>
                            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                            <option value="client" <?= $user['role'] === 'client' ? 'selected' : '' ?>>Client</option>
                        </select>

                        <!------------Submit button-------------->
                        <div class="text-center mb-3 mt-5">
                            <button type="submit" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5"><i class="fa-solid fa-circle-plus me-3"></i>Enregistrer</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>