<main>
    <div class="container">
        <!------------Card container for add article---------->
        <div class="card border shadow-sm rounded-3 px-2 py-2">

            <!----------Succes or error message-------------->
            <div class="text-center">
                <?php if (isset($_SESSION['successMessage'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['successMessage'];
                        unset($_SESSION['successMessage']); ?>
                    </div>
                <?php elseif (isset($_SESSION['errorMessage'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['errorMessage'];
                        unset($_SESSION['errorMessage']); ?>
                    </div>
                <?php endif; ?>
            </div>

            <!------------------Header for the page---------------->
            <h1 class="text-center rounded-3 bg-secondary text-white py-2 mx-auto w-100">Ajouter un article</h1>

            <!---------------Form card for add article------------>
            <div class="card border shadow-sm rounded-3 px-4 py-3">
                <form action="index.php?action=addArticle" method="POST" enctype="multipart/form-data">

                    <!----------------Input for article title-------------->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre :</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <!------------Input for article introduction---------->
                    <div class="mb-3">
                        <label for="intro" class="form-label">Introduction :</label>
                        <textarea class="form-control" id="intro" name="intro" required></textarea>
                    </div>

                    <!------------Input for article description---------->
                    <div class="mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>

                    <!--------------Input for article image------------->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image :</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <!--------Dropdown to select the article type------->
                    <div class="mb-3">
                        <label for="type" class="form-label">Type :</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="console">Console</option>
                            <option value="jeu">Jeu</option>
                            <option value="pocket">Pocket</option>
                            <option value="gameplay">GamePlay</option>
                        </select>
                    </div>

                    <!------------Submit button-------------->
                    <div class="text-center mt-5 mb-3">
                        <button type="submit" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5"><i class="fa-solid fa-circle-plus me-3"></i>Ajouter l'article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>