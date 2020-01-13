<?php

namespace App\src\controller;

use App\src\model\View;
use App\src\DAO\UserDAO;
use App\src\model\User;

class UserController

{
	private $view;
	private $userDAO;
	private $user;

    public function __construct()
    {
        $this->view = new View();
        $this->userDAO = new UserDAO();
        $this->user = new User();
       

    }

    public function backUser()
    {
    	$users = $this->userDAO->getUsers();
    	$this->view->render('backUser',[
    		'users' => $users
    	]);
    }

    public function backBlacklist()
    {
        $users = $this->userDAO->getUsers();
        $this->view->render('backBlacklist',[
            'users' => $users
        ]);
    }


    public function signIn($post)
    {
    	if(isset($post['submit'])){
    		$User = new User();
    		$User->newUser($post);                 
    	}
    	$this->view->render('signIn', ['post' => $_POST]);
    }

    public function logIn($post)
    {
    	if(isset($post['submit'])){
    		$User = new User();
    		$User->connectUser($post);
    	}
    	$this->view->render('logIn', ['post' => $_POST]);        
    }

    public function logOut()
    {
        $User = new User();
        $User->disconnectUser();
    }

    public function myProfil($data)
    {
        $users = $this->userDAO->getUserByUserName($data);
        $this->view->render('myProfil',[
            'users' => $users
        ]);        
    }

    public function changePassword($post)
    {
        if(isset($post['submit'])){
            $User = new User();
            $User->newPassword($post);
        }
        $this->view->render('myProfil', ['post' => $_POST]);


    }


}