<?php

namespace App\src\model;

use App\src\DAO\ArticleDAO;

class Article
{
    private $id;

    private $title;
    
    private $content;
    
    private $user_id;
    
    private $date_added;

    private $picture;

    private $nb_view;

    private $user;





    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
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
     * @param mixed $user_id
     */
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * @param mixed $date_added
     */
    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;
    }

        /**
     * @return mixed
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param mixed $picture
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
    }


        /**
     * @return int
     */
    public function getNb_view()
    {
        return $this->nb_view;
    }

    /**
     * @param int $nb_view
     */
    public function setNb_view(int $nb_view)
    {
        $this->nb_view = $nb_view;
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


    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
    }


    public function newArticle()
    {
        if(empty(trim($_POST['title'])) || empty(trim($_POST['content'])))
        {
            echo '<script>alert("Le titre ou le contenu est vide. Veuillez verifier.")</script>';   
        }
        else
        {
             
            $this->articleDAO->addArticle($_POST);
        }
    }
    
}