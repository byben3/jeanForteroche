<?php

namespace App\src\DAO;

use App\src\model\Article;
use App\src\model\User;

class ArticleDAO extends DAO
{
    public function getArticles()
    {
        $sql = 'SELECT * FROM Article JOIN user WHERE user.idUser = Article.user_id ORDER BY id DESC';
        $result = $this->sql($sql);
        $articles = [];
        foreach ($result as $row) {
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        return $articles;
    }


    public function getArticle($idArt)
    {
        $sql = 'SELECT * FROM Article JOIN user WHERE id = ?';
        $result = $this->sql($sql, [$idArt]);
        $row = $result->fetch();
        if($row) {
            return $this->buildObject($row);
        }
    }

    public function addArticle($article)
    {
      
        extract($article);
        $sql = 'INSERT INTO Article (title, content, user_id, date_added) VALUES (?, ?, ?, NOW())';
        $this->sql($sql, [$title, $content, $user_id]);
    }

    public function editArticle($post)

    {
        extract($post);
        $title = $_POST['title']; 
        $content = $_POST['content'];
        $id = $_POST['id'];
        $sql = "UPDATE Article SET title='$title', content = '$content' WHERE id = '$id'";     
        $this->sql($sql);

    }

    public function deleteArticle($idArt)
    {
        $sql = 'DELETE FROM Article WHERE id = ?';
        $this->sql($sql,[$idArt]);
    }


    
    private function buildObject(array $row)
    {
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setDateAdded($row['date_added']);
        $article->setUser_id($row['user_id']);
        $user = new User();
        $user->setUserName($row['userName']);
        $user->setMail($row['mail']);
        $article->setUser($user);
        return $article;
        
    }
}


