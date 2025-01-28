<main>
    <div class="container">
        <!----------Card container for article modification---------->
        <div class="card border shadow-sm rounded-3 px-2 py-2">

            <!-------------------Header for the page----------------->
            <h1 class="text-center rounded-3 bg-secondary text-white py-2 mx-auto w-100">Modifier un article</h1>

            <!-------------Form card for article information--------->
            <div class="card border shadow-sm rounded-3 px-4 py-3">
                <form action="<?= BASE_URL ?>public/index.php?action=updateArticle&id=<?= $article['id'] ?>" method="POST" enctype="multipart/form-data">

                    <!------------Input for article title---------->
                    <div class="form-group my-2">
                        <label for="title">Titre :</label>
                        <input type="text" class="form-control mt-2" id="title" name="title" value="<?= htmlspecialchars($article['title']) ?>" required>
                    </div>

                    <!-------Input for article introduction-------->
                    <div class="form-group my-2">
                        <label for="intro">Intro :</label>
                        <textarea class="form-control mt-2" id="intro" name="intro" rows="3" required><?= htmlspecialchars($article['intro']) ?></textarea>
                    </div>

                    <!-------Input for article description-------->
                    <div class="form-group my-2">
                        <label for="description">Description :</label>
                        <textarea class="form-control mt-2" id="description" name="description" rows="5" required><?= htmlspecialchars($article['description']) ?></textarea>
                    </div>

                    <!------------Display current image---------->
                    <div class="form-group my-2 text-center fw-bold">
                        <label for="image">Image actuelle :</label>
                        <div>
                            <?php if (!empty($article['image'])): ?>
                                <img src="<?= BASE_URL . 'public/assets/img/' . $article['image']; ?>" alt="Image actuelle" style="max-width: 200px; height: auto;">
                            <?php else: ?>
                                <p>Aucune image disponible</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-------Input for update a new image------->
                    <div class="form-group my-2">
                        <label for="image">Nouvelle image (facultatif) :</label>
                        <input type="file" class="form-control mt-2" id="image" name="image">
                    </div>

                    <!--Hidden input to retain current image if no new image is uploaded-->
                    <input type="hidden" name="current_image" value="<?= $article['image']; ?>">

                    <!----Dropdown to select the article type---->
                    <div class="form-group my-2">
                        <label for="type">Type :</label>
                        <select class="form-control mt-2" id="type" name="type" required>
                            <option value="console" <?= $article['type'] === 'console' ? 'selected' : '' ?>>Console</option>
                            <option value="jeu" <?= $article['type'] === 'jeu' ? 'selected' : '' ?>>Jeu</option>
                            <option value="pocket" <?= $article['type'] === 'pocket' ? 'selected' : '' ?>>Pocket</option>
                            <option value="gameplay" <?= $article['type'] === 'gameplay' ? 'selected' : '' ?>>GamePlay</option>
                        </select>
                    </div>

                    <!------------Submit button-------------->
                    <div class="text-center mb-3 mt-5">
                        <button type="submit" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5"><i class="fa-solid fa-circle-plus me-3"></i>Sauvegarder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>