<main>
    <!---------------Section principale de la page d'accueil-------------------->
    <div class="container">
        <div class="card border shadow-sm rounded-3 px-2 pt-2">

            <!------------------Header for the page---------------->
            <h1 class="text-center rounded-3 bg-secondary text-white py-2 mx-auto w-100">Ajouter un utilisateur</h1>

            <!----------------Form card for add user-------------->
            <div class="card border shadow-sm rounded-3 px-4 py-3">
                <form action="?action=addUser" method="POST">
                    <!------------Input for name user---------->
                    <div class="form-group my-3">
                        <label for="name">Nom :</label>
                        <input type="text" class="form-control mt-2" id="name" name="name" autocomplete="name" required>
                    </div>

                    <!------------Input for email user-------->
                    <div class="form-group mb-3">
                        <label for="email">Email :</label>
                        <input type="email" class="form-control mt-2" id="email" name="email" autocomplete="email" required>
                    </div>

                    <!------------Input for role user-------->
                    <div class="form-group mb-3">
                        <label for="role">Rôle :</label>
                        <select id="role" class="form-control mt-2" name="role">
                            <option value="client">Client</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <!---------Input for password user------->
                    <div class="form-group mb-3">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control mt-2" id="password" name="password" autocomplete="current-password" required>
                    </div>

                    <!------------Submit button-------------->
                    <div class="text-center mb-3 mt-5">
                        <button type="submit" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5"><i class="fa-solid fa-circle-plus me-3"></i>Ajouter l'utilisateur</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>