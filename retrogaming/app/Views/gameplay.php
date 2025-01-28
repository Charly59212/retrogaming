<?php
// id number of the articles page
$articleId = $articleId ?? 4;
?>

<!-------------------Main section of the home page----------------->
<main>
    <div class="container">
        <div class="card border shadow-sm rounded-3 px-2 py-2">
            <h1 class="text-center rounded-3 bg-secondary text-white py-2 mx-auto w-100">Les catégories de jeux vidéos</h1>

            <!-----------Displaying success or error messages---------->
            <div class="d-flex justify-content-center">
                <?php
                // Retrieving session messages success and error
                $success = $_SESSION['successMessage'] ?? null;
                $error = $_SESSION['errorMessage'] ?? null;

                // If a success message is present, it is displayed in a green alert
                if ($success): ?>
                    <div class="alert alert-success alert-dismissible fade show w-100 text-center" role="alert">
                        <?= htmlspecialchars($success); ?>

                        <!---Button to close the alert--->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['successMessage']);
                    ?>
                <?php endif; ?>

                <!-------If an error message is present, display it in a red alert------->
                <?php if ($error): ?>
                    <div class="alert alert-danger alert-dismissible fade show w-100 text-center" role="alert">
                        <?= htmlspecialchars($error); ?>
                        <!---Button to close the alert--->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php unset($_SESSION['errorMessage']);
                    ?>
                <?php endif; ?>
            </div>

            <!----------------------------Articles---------------------------->
            <!----Loop through the articles array and display each article---->
            <?php foreach ($articles as $article): ?>
                <section class="article border border-dark rounded-2 my-3 mx-3">
                    <div class="article-content">

                        <!--------Display article title, introduction and description-------->
                        <div class="text">
                            <h3><?= htmlspecialchars($article['title']) ?></h3>
                            <p><?= htmlspecialchars($article['intro']) ?></p>
                            <p><?= htmlspecialchars($article['description']) ?></p>
                        </div>

                        <!---------------------Display article image------------------------->
                        <div class="m-auto">
                            <img src="<?= htmlspecialchars(BASE_URL . 'public/assets/img/' . $article['image']) ?>"
                                alt="<?= htmlspecialchars($article['title']) ?>"
                                title="<?= htmlspecialchars($article['title']) ?>">
                        </div>
                    </div>
                </section>
            <?php endforeach; ?>
        </div>

        <!---------------------Comments section--------------------->
        <div class="comments-section">
            <div class="existing-comments">
                <h3>Commentaires</h3>

                <!-------Iterate through the comments array and display each comment------->
                <?php
                $comments = $comments ?? [];
                foreach ($comments as $comment):
                ?>
                    <div class="comment">
                        <div class="comment-header">

                            <!------------------Display comment author name------------->
                            <span class="comment-author"><?= htmlspecialchars($comment['user_name']) ?></span>
                            <div class="star-rating read-only">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <span><?= $i <= $comment['rating'] ? '★' : '☆' ?></span>
                                <?php endfor; ?>
                            </div>
                        </div>

                        <!-------------------Display comment content------------------>
                        <p><?= htmlspecialchars($comment['content']) ?></p>

                        <!-------If the logged-in user is the comment author, display a delete button------->
                        <?php if (isset($_SESSION['name']) && $_SESSION['name'] == $comment['user_name']): ?>
                            <form action="<?php echo BASE_URL; ?>public/index.php?action=deleteComment" method="POST">
                                <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
                                <input type="hidden" name="article_id" value="<?= $articleId ?>">
                                <input type="hidden" name="action" value="viewGameplayArticle">
                                <div class="text-end">
                                    <button type="submit" class="btn btn-danger btn-sm border-2 border-warning rounded-5"
                                        onclick="confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                                        <i class="me-2 py-2 fa-solid fa-trash-can"></i>Supprimer mon commentaire</button>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-------If a user is logged in, display the form to add a new comment------->
            <?php if (isset($_SESSION['name'])): ?>
                <div class="new-comment">
                    <h3>Ajouter votre commentaire</h3>
                    <form action="<?php echo BASE_URL; ?>public/index.php?action=addComment" class="comment-table-page" method="POST">
                        <input type="hidden" name="article_id" value="<?= $articleId ?>">
                        <input type="hidden" name="action" value="viewGameplayArticle">

                        <!---------Comment textarea for user input------->
                        <textarea name="content" placeholder="Commentaire" required></textarea>
                        <div class="star-rating-input mx-auto my-3">
                            <span class="note">Votre note : &nbsp;</span>

                            <!-----Star rating input for new comment----->
                            <div class="star-rating bg-white">
                                <input type="radio" name="rating" class="star-rating" value="5" id="5-stars">
                                <label for="5-stars">&#9733;</label>
                                <input type="radio" name="rating" class="star-rating" value="4" id="4-stars">
                                <label for="4-stars">&#9733;</label>
                                <input type="radio" name="rating" class="star-rating" value="3" id="3-stars">
                                <label for="3-stars">&#9733;</label>
                                <input type="radio" name="rating" class="star-rating" value="2" id="2-stars">
                                <label for="2-stars">&#9733;</label>
                                <input type="radio" name="rating" class="star-rating" value="1" id="1-star">
                                <label for="1-star">&#9733;</label>
                            </div>
                        </div>

                        <!-----Submit button for adding a comment----->
                        <button type="submit" class="btn btn-primary w-75 border-2 border-warning mx-auto my-3 py-2 rounded-5">
                            <i class="me-2 py-2 fa-solid fa-envelope"></i>Envoyer votre commentaire</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>