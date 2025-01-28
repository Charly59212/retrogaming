<?php
// CommentModel manages comment operations, including retrieval, addition, update, and deletion
class CommentModel
{
    private $db;

    // Initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Retrieve comments for a specific article, including user names
    public function getComments($articleId)
    {
        $stmt = $this->db->prepare("SELECT c.*, u.name as user_name FROM comments c JOIN users u ON c.user_id = u.id WHERE c.article_id = ?");
        $stmt->execute([$articleId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a comment to an article, checking if the user already commented
    public function addComment($articleId, $userName, $content, $rating)
    {
        // Checks if the user has already commented on this article
        $checkStmt = $this->db->prepare("
            SELECT COUNT(*) FROM comments c
            JOIN users u ON c.user_id = u.id
            WHERE c.article_id = ? AND u.name = ?
        ");
        $checkStmt->execute([$articleId, $userName]);
        $commentCount = $checkStmt->fetchColumn();

        if ($commentCount > 0) {
            // User already commented
            return false; 
        }

        // If the user hasn't commented yet, add the comment
        $stmt = $this->db->prepare("
            INSERT INTO comments (article_id, user_id, content, rating) 
            SELECT ?, u.id, ?, ? FROM users u WHERE u.name = ?
        ");
        return $stmt->execute([$articleId, $content, $rating, $userName]);
    }

    // Delete a comment by its ID and user name
    public function deleteComment($commentId, $userName)
    {
        $stmt = $this->db->prepare("
                DELETE c FROM comments c
                JOIN users u ON c.user_id = u.id
                WHERE c.id = ? AND u.name = ?
            ");
        return $stmt->execute([$commentId, $userName]);
    }

    // Retrieve all comments with associated user and page names
    public function getAllComments() {
        $stmt = $this->db->prepare('
            SELECT comments.*, users.name AS user_name, pages.name AS page_name
            FROM comments
            INNER JOIN users ON comments.user_id = users.id
            INNER JOIN pages ON comments.article_id = pages.id
            ORDER BY comments.id ASC
        ');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Update the content and rating of a comment
    public function updateComment($id, $content, $rating)
    {
        $stmt = $this->db->prepare('UPDATE comments SET content = :content, rating = :rating WHERE id = :id');
        return $stmt->execute([
            'content' => $content,
            'rating' => $rating,
            'id' => $id,
        ]);
    }

    // Delete a comment by its ID (for admin use)
    public function deleteAdminComment($commentId)
    {
        $stmt = $this->db->prepare('DELETE FROM comments WHERE id = :id');
        return $stmt->execute(['id' => $commentId]);
    }
}
