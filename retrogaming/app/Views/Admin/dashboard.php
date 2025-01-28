<main>
    <!-------------Card container for admin dashboard----------->
    <div class="container">

        <!------------------Header for the page---------------->
        <div class="pt-3 mb-4">
            <h1 class="text-center rounded-3 bg-secondary text-white py-2 mx-auto w-75">Tableau de bord administrateur</h1>
        </div>

        <!--------------Succes or error message---------------->
        <div class="card border shadow-sm rounded-3 px-2 py-2">
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

            <!---------------Title of table for user management----------------->
            <h2 class="text-center rounded-3 bg-dark-subtle pb-2 pt-1 mx-auto w-75">Gestion des utilisateurs</h2>

            <!------------Card container for editing or adding a user---------->
            <div class="card border shadow-sm rounded-3 pt-3">

                <!----User management table---->
                <table class="table table-striped">
                    <thead>

                        <!---Column headers for the Users table--->
                        <tr>
                            <th class="mobile-table">ID</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th class="mobile-table">Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!----Loop through each user and display their information--------->
                        <?php foreach ($users as $user): ?>

                            <!---Display user information with ID, Name, Email and Role---->
                            <tr>
                                <td class="mobile-table"><?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['name']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td class="mobile-table"><?= htmlspecialchars($user['role']) ?></td>
                                <td>

                                    <!-------Actions column for Edit or Delete user------>
                                    <div class="d-flex justify-content-center">

                                        <!-------------------Edit user form------------->
                                        <form action="index.php" method="GET">
                                            <input type="hidden" name="action" value="editUser">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">

                                            <!-------------Edit button form------------>
                                            <button type="submit" class="button-mobile btn btn-success btn-sm me-2">Modifier</button>
                                        </form>

                                        <!---------------Delete user button----------->
                                        <form action="?action=deleteUser" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                            <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                            <button type="submit" class="button-mobile btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!---------------Add user button------------------->
                <form action="index.php" method="GET" class="text-center my-3">
                    <input type="hidden" name="action" value="addUser">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <button type="submit" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5">
                        <i class="fa-solid fa-circle-plus me-3"></i>Ajouter un utilisateur</button>
                </form>
            </div>
        </div>

        <!------------------------Table for articles management--------------------->
        <div class="card border shadow-sm rounded-3 px-2 py-2">

            <!---------------Title of table for articles management----------------->
            <h2 class="text-center rounded-3 bg-dark-subtle pb-2 pt-1 mx-auto w-75">Gestion des articles</h2>

            <!------------Card container for editing or adding an article---------->
            <div class="card border shadow-sm rounded-3 pt-3">

                <!-----------------Articles management table---------------------->
                <table class="table table-striped">
                    <thead>

                        <!-------Column headers for the articles table----------->
                        <tr>
                            <th class="mobile-table">ID</th>
                            <th>Titre</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!------Loop through each article and display their information----->
                        <?php foreach ($articles as $article): ?>
                            <tr>

                                <!----Display article information with ID, Title and Type--->
                                <td class="mobile-table"><?= htmlspecialchars($article['id']); ?></td>
                                <td><?= htmlspecialchars($article['title']); ?></td>
                                <td><?= htmlspecialchars($article['type']); ?></td>

                                <!--------Actions column for Edit or Delete article-------->
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="<?= BASE_URL; ?>public/index.php?action=editArticle&id=<?= $article['id']; ?>" class="button-mobile btn btn-success btn-sm me-2">Modifier</a>
                                        <a href="<?= BASE_URL; ?>public/index.php?action=deleteArticle&id=<?= $article['id']; ?>" class="button-mobile btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet article ?');">Supprimer</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!---------Add article button---------->
                <div class="text-center my-3">
                    <a href="<?= BASE_URL; ?>public/index.php?action=addArticle" class="btn btn-primary border-2 border-warning mt-1 mb-2 px-4 py-2 rounded-5">
                        <i class="fa-solid fa-circle-plus me-3"></i>Ajouter un Article</a>
                </div>
            </div>
        </div>



        <!------------------------Table for comments management--------------------->
        <div class="card border shadow-sm rounded-3 px-2 py-2">

            <!---------------Title of table for comments management----------------->
            <h2 class="text-center rounded-3 bg-dark-subtle pb-2 pt-1 mx-auto w-75">Gestion des commentaires</h2>

            <!-------------Card container for editing or adding comments------------>
            <div class="card border shadow-sm rounded-3 pt-3">

                <!------------------Comments management table---------------------->
                <table class="table table-striped">
                    <thead>
                        <tr>

                            <!-------Column headers for the comments table-------->
                            <th class="mobile-table">ID</th>
                            <th>Page</th>
                            <th>User</th>
                            <th>Contenu</th>
                            <th class="mobile-table">Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <!---Loop through each comment and display their information---->
                        <?php foreach ($comments as $comment): ?>
                            <tr>

                                <!---Display comment information with ID, Page, User, Content and Rating--->
                                <td class="mobile-table"><?= $comment['id']; ?></td>
                                <td><?php echo $comment['page_name']; ?></td>
                                <td><?= htmlspecialchars($comment['user_name']); ?></td>

                                <!--------------------Form for editing comment content------------------->
                                <td>
                                    <form action="index.php?action=updateComment" class="comment-table" required method="post">
                                        <input type="hidden" name="id" value="<?= $comment['id']; ?>">
                                        <textarea name="content"><?= htmlspecialchars($comment['content']); ?></textarea>
                                </td>

                                <!-------------------Star rating system for comments-------------------->
                                <td class="mobile-table">
                                    <div class="star-rating bg-white">
                                        <input type="radio" name="rating" class="star-rating" value="5" id="5-stars-<?= $comment['id'] ?>" <?= $comment['rating'] == 5 ? 'checked' : '' ?>>
                                        <label for="5-stars-<?= $comment['id'] ?>">&#9733;</label>
                                        <input type="radio" name="rating" class="star-rating" value="4" id="4-stars-<?= $comment['id'] ?>" <?= $comment['rating'] == 4 ? 'checked' : '' ?>>
                                        <label for="4-stars-<?= $comment['id'] ?>">&#9733;</label>
                                        <input type="radio" name="rating" class="star-rating" value="3" id="3-stars-<?= $comment['id'] ?>" <?= $comment['rating'] == 3 ? 'checked' : '' ?>>
                                        <label for="3-stars-<?= $comment['id'] ?>">&#9733;</label>
                                        <input type="radio" name="rating" class="star-rating" value="2" id="2-stars-<?= $comment['id'] ?>" <?= $comment['rating'] == 2 ? 'checked' : '' ?>>
                                        <label for="2-stars-<?= $comment['id'] ?>">&#9733;</label>
                                        <input type="radio" name="rating" class="star-rating" value="1" id="1-star-<?= $comment['id'] ?>" <?= $comment['rating'] == 1 ? 'checked' : '' ?>>
                                        <label for="1-star-<?= $comment['id'] ?>">&#9733;</label>
                                    </div>
                                </td>

                                <!-----------------Actions column for Edit or Delete comment---------->
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="button-mobile btn btn-success me-2">Modifier</button>
                                        <a href="?action=deleteAdminComment&id=<?php echo $comment['id']; ?>" class="button-mobile btn btn-danger"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">Supprimer</a>
                                    </div>
                                </td>
                                </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>