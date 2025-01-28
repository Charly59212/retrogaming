<?php
// ArticleModel provides methods to manage articles, including retrieval, creation, updates, and deletion
class ArticleModel
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Retrieves articles by their type, ordered by ID
    public function getArticlesByType($type)
    {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE type = ? ORDER BY id ASC");
        $stmt->execute([$type]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Retrieves all articles, ordered by ID
    public function getAllArticles()
    {
        $stmt = $this->db->prepare("SELECT * FROM articles ORDER BY id ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Adds a new article to the database
    public function addArticle($title, $intro, $description, $image, $type)
    {
        $sql = "INSERT INTO articles (title, intro, description, image, type) 
                VALUES (:title, :intro, :description, :image, :type)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':intro', $intro);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':type', $type);

        // Bind the image parameter, use an empty string if null
        $stmt->bindValue(':image', $image ?? '', PDO::PARAM_STR);

        return $stmt->execute();
    }

    // Retrieves a single article by its ID
    public function getArticleById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Updates an existing article's details
    public function updateArticle($id, $title, $intro, $description, $image, $type)
    {
        $stmt = $this->db->prepare("UPDATE articles SET title = ?, intro = ?, description = ?, image = ?, type = ? WHERE id = ?");
        $stmt->execute([$title, $intro, $description, $image, $type, $id]);
    }

    // Deletes an article by its ID
    public function deleteArticle($id)
    {
        $stmt = $this->db->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
