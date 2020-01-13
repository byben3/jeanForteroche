<?php

namespace App\config;

use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\UserController;
use App\src\controller\ErrorController;

class Router
{
    private $frontController;
    private $backController;
    private $userController;
    private $errorController;
    

    public function __construct()
    {
        $this->frontController = new FrontController();
        $this->backController = new BackController();
        $this->userController = new UserController();
        $this->errorController = new ErrorController();
 
    }

    public function run()
    {
        try{
            if(isset($_GET['route']))
            {
                if($_GET['route'] === 'article'){
                    $this->frontController->article($_GET['idArt']);
                }
                
                else if($_GET['route'] === 'signIn'){
                    $this->userController->signIn($_POST);
                }

                else if($_GET['route'] === 'logIn'){
                    $this->userController->logIn($_POST);
                }

                else if($_GET['route'] === 'backMain' && $this->isUserAdmin() === true){
                    $this->backController->backMain();
                }
                
                else if($_GET['route'] === 'backAddArticle' && $this->isUserAdmin() === true){

                    $this->backController->backAddArticle($_POST);
                }

                else if($_GET['route'] === 'deleteArticle' && $this->isUserAdmin() === true){
                    $this->backController->deleteArticle($_GET['idArt']);
                }

                else if($_GET['route'] === 'backEditArticle' && $this->isUserAdmin() === true){
                    $this->backController->backEditArticle($_GET['idArt']);
                }

                else if($_GET['route'] === 'backListArticle' && $this->isUserAdmin() === true){
                    $this->backController->backListArticle();
                }

                else if($_GET['route'] === 'backReportComment' && $this->isUserAdmin() === true){
                    $this->backController->backReportComment();
                }

                else if($_GET['route'] === 'deleteReport' && $this->isUserAdmin() === true){
                    $this->backController->deleteReport($_GET['idReport']);
                }

                else if($_GET['route'] === 'backEditReportComment' && $this->isUserAdmin() === true){
                    $this->backController->backEditComment($_GET['idComment']);
                }

                else if($_GET['route'] === 'editArticle' && $this->isUserAdmin() === true){
                    $this->backController->editArticle($_POST);
                }

                else if($_GET['route'] === 'editComment' && $this->isUserAdmin() === true){
                    $this->backController->editComment($_POST);
                }

                else if($_GET['route'] === 'deleteComment' && $this->isUserAdmin() === true){
                    $this->backController->deleteComment($_GET['idComment']);
                }                 

                else if($_GET['route'] === 'addComment'){
                    if(count($_POST) !== 0)
                    {
                        $this->frontController->addComment($_POST);
                    }
                    $this->frontController->home(); 
                }

                else if($_GET['route'] === 'reportComment'){
                    $this->frontController->reportComment($_GET['idComment']);
                }                
                
                else if($_GET['route'] === 'addReportComment'){
                    $this->frontController->addReportComment($_POST);
                }      

                else if($_GET['route'] === 'backUser' && $this->isUserAdmin() === true){
                    $this->userController->backUser();
                }

                else if($_GET['route'] === 'backBlacklist' && $this->isUserAdmin() === true){
                    $this->userController->backBlacklist();
                }

                else if($_GET['route'] === 'setBlacklist' && $this->isUserAdmin() === true){
                    $this->backController->setBlacklist($_GET['userName']);
                }

                else if($_GET['route'] === 'logOut'){
                    $this->userController->logOut();
                }

                else if($_GET['route'] === 'myProfil' && $this->isLog() === true){
                    $this->userController->myProfil($_GET['userName']);
                }

                else if($_GET['route'] === 'changePassword' && $this->isLog() === true){
                    $this->userController->changePassword($_POST);
                }

                else{
                    $this->errorController->error404();
                }
            }
            else{
                $this->frontController->home();

            }
        }
        catch (\Exception $e)
        {
            $this->errorController->error404();
        }
    }

    private function isUserAdmin()
    {
        if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin')
        {
            return true;
        }
        else
        {
            $this->errorController->error403();
        }
    }

    private function isLog()
    {
        if(isset($_SESSION['userName']))
        {
            return true;
        }
        else
        {
            $this->errorController->error403();
        }
    }

}
