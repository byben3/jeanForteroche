<?php

namespace App\src\DAO;

use App\src\model\Comment;
use App\src\model\User;

class CommentDAO extends DAO
{
    public function getCommentsFromArticle($idArt)
    {
        $sql = 'SELECT * FROM Comment JOIN user WHERE user.idUser = Comment.user_id AND article_id = ? ORDER BY idComment DESC';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach ($result as $row) {
        $commentId = $row['idComment'];
        $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function getComment($idComment)
    {
        $sql = 'SELECT * FROM Comment JOIN user WHERE user.idUser = Comment.user_id AND idComment = ?';
        $result = $this->sql($sql, [$idComment]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);        
        }
    }

    public function addComment($comment)
    {
      
        extract($comment);
        $content = htmlspecialchars($_POST['content']);
        $sql = 'INSERT INTO Comment (content, user_id, article_id, dateAdded) VALUES (?, ?, ?, NOW())';
        $this->sql($sql, [$content, $user_id, $article_id]);
    }

    public function editComment($post)
    {
        extract($post);
        $content = $_POST['content'];
        $id = $_POST['id'];
        $sql = "UPDATE Comment SET content = '$content' WHERE idComment = '$id'";
        $this->sql($sql);
    }

    public function deleteComment($idComment)
    {
        $sql = 'DELETE FROM Comment WHERE idComment = ?';
        $this->sql($sql,[$idComment]);
    }



    private function buildObject(array $row)
    {
        $comment = new Comment();
        $comment->setIdComment($row['idComment']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['dateAdded']);
        $comment->setUser_id($row['user_id']);
        $comment->setArticle_id($row['article_id']);
        $user = new User();
        $user->setUserName($row['userName']);
        $user->setMail($row['mail']);
        $comment->setUser($user);
        

        return $comment;
    }
}