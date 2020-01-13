<?php

namespace App\src\controller;

use App\src\model\View;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\ReportDAO;
use App\src\DAO\UserDAO;
use App\src\model\Comment;
use App\src\model\User;
use App\src\model\Article;

class BackController
{
    private $view;
    private $articleDAO;
    private $commentDAO;
    private $reportDAO;
    private $userDAO;
    private $comment;
    private $article;

    public function __construct()
    {
        $this->view = new View();
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->reportDAO = new ReportDAO();
        $this->userDAO = new UserDAO();
        $this->comment = new Comment();
        $this->user = new User();
        $this->article = new Article();
    }


    public function backMain()
    {
        $articles = $this->articleDAO->getArticles();
        $users = $this->userDAO->getUsers();
        $report = $this->reportDAO->getReport();
    	$this->view->render('backMain',['articles' => $articles,'users' => $users,'report' => $report]);
    }



    public function backAddArticle($post)
    {
        if(isset($post['submit'])) {
            $this->article->newArticle($post);
            header('Location: ../public/index.php');
        }

    	$this->view->render('backAddArticle');
    }

    public function backEditArticle($id)
    {
        $article = $this->articleDAO->getArticle($id);
        $this->view->render('backEditArticle', ['article' => $article]);
    }

    public function backListArticle()
    {
        $articles = $this->articleDAO->getArticles();
        $this->view->render('backListArticle', [
            'articles' => $articles
        ]);
    }

    public function editArticle($post)
    {

        if(isset($post['submit'])) {
            $this->articleDAO->editArticle($post);
            header('Location: ../public/index.php');
        }
        $this->view->render('backEditArticle', ['article' => $article]);

    }

    public function deleteArticle($idArt)
    {
        $this->articleDAO->deleteArticle($idArt);
        header('Location: ../public/index.php?route=backListArticle');
    }

    public function backReportComment()
    {
        $reports = $this->reportDAO->getReport();


        $this->view->render('backReportComment', ['reports' => $reports]);
    }

    public function deleteReport($idReport)
    {
        $this->reportDAO->deleteReport($idReport);

        $reports = $this->reportDAO->getReport();
        $this->view->render('backReportComment', ['reports' => $reports]);
    }

    public function backEditComment($id)
    {
        $comment = $this->commentDAO->getComment($id);
        $this->view->render('backEditReportComment', ['comment' => $comment]);
    }

    public function editComment($post)
    {
        if(isset($post['submit'])) {
            $this->commentDAO->editComment($post);
            $reports = $this->reportDAO->getReport();
            header('Location: ../public/index.php?route=backReportComment');
        }
    }

    public function deleteComment($id)
    {
        $this->commentDAO->deleteComment($id);
        header('Location: ../public/index.php?route=backReportComment');
    }

    public function setBlacklist($post)
    {
        $this->user->blacklist($post);
        header('Location: ../public/index.php?route=backUser');
    }




}