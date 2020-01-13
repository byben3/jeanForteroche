<?php

namespace App\src\model;

use App\src\DAO\CommentDAO;


class Comment
{
	private $idComment;

	private $dateAdded;

	private $content;

	private $user_id;

	private $article_id;

	private $likes;

	private $dislikes;

    private $user;



    /**
     * @return mixed
     */
    public function getIdComment()
    {
        return $this->idComment;
    }

    /**
     * @param mixed $idComment
     */
    public function setIdComment($idComment)
    {
        $this->idComment = $idComment;
    }


    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * @param mixed $dateAdded
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;
    }


    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }



    /**
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id;
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }


    /**
     * @return mixed
     */
    public function getArticle_id()
    {
        return $this->article_id;
    }

    /**
     * @param mixed $article_id
     */
    public function setArticle_id($article_id)
    {
        $this->article_id = $article_id;
    }


    /**
     * @return mixed
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * @param mixed $likes
     */
    public function setLikes($likes)
    {
        $this->likes = $likes;
    }


    /**
     * @return mixed
     */
    public function getDislikes()
    {
        return $this->dislikes;
    }

    /**
     * @param mixed $dislikes
     */
    public function setDislikes($dislikes)
    {
        $this->dislikes = $dislikes;
    }


    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }


    public function newComment($post)
    {
        if(empty(trim($_POST['content'])))
        {
            echo '<script>alert("Veuiller ecrire un commentaire dans le cadre")</script>';
        }
        else
        {
            $commentDAO = new CommentDAO();                    
            $commentDAO->addComment($post);
        }
    }

}
