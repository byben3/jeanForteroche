<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\DAO\ReportDAO;
use App\src\model\View;
use App\src\model\User;
use App\src\model\Comment;

class FrontController
{
    private $articleDAO;
    private $userDAO;
    private $view;

    public function __construct()
    {
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->reportDAO = new ReportDAO();
        $this->view = new View();
        $this->user = new User();
    }

    public function home()
    {

        $articles = $this->articleDAO->getArticles();
        $this->view->render('home', ['articles' => $articles]);
    }
    
    public function article($id)
    {
        $article = $this->articleDAO->getArticle($id);
        $comments = $this->commentDAO->getCommentsFromArticle($id);
        $report = $this->reportDAO->getReport();
        $this->view->render('single', [
            'article' => $article,
            'comments' => $comments,
            'report' => $report
        ]);
    }

    public function addComment($post)
    {
        if(isset($post['submit'])) {
            $commentDAO = new Comment();                    
            $commentDAO->newComment($post);
            extract($post);
            header('Location: ../public/index.php?route=article&idArt='.$article_id);
        }

        $this->view->render('single');
    }
    
    public function reportComment($idComment)
    {
        $comment = $this->commentDAO->getComment($idComment);
        $this->view->render('reportComment', ['comment' => $comment]);        
    } 

    public function addReportComment($post)
    {
        if(isset($post['submit'])) {
            $reportDAO = new ReportDAO();                    
            $reportDAO->addReport($post);
            extract($post);
            header('Location: ../public/index.php?route=article&idArt='.$articleId);
            
        }

        $this->view->render('single'); 
    }
}