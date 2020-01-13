<?php

namespace App\src\model;

use App\src\DAO\UserDAO;
use App\src\model\User;


class User
{

    private $idUser;

    private $userName;

    private $firstName;

    private $lastName;

    private $mail;

    private $password;

    private $role;

    private $blacklist;

    private $dateCreate;

    private $birthday;

    private $address;

    private $city;

    private $country;


    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $id
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

        /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

        /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

        /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

        /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

        /**
     * @return mixed
     */
    public function getBlacklist()
    {
        return $this->blacklist;
    }

    /**
     * @param mixed $blacklist
     */
    public function setBlacklist($blacklist)
    {
        $this->blacklist = $blacklist;
    }

        /**
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * @param mixed $dateCreate
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;
    }

        /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

        /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

        /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;

    }
        /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }


    public function __construct()
    {

        $this->userDAO = new UserDAO();
    }





    public function existingUser()
    {
          
        $user = $this->userDAO->getUserByUserName($_POST['userName']); 
        if($user !== false && $user instanceof User)
        {
            return true;
        }
        else
        {
            return false;
        }    
    }

    public function connectUser()
    {

        if(!empty($_POST['userName']) || !empty($_POST['password']))
        {

            $user = $this->userDAO->getUserByUserName($_POST['userName']); 
           if($user !== false && $user instanceof User)
           {

              if(password_verify($_POST['password'], $user->getPassword())=== true)
              {
                $_SESSION['userName'] = $_POST['userName'];
                $_SESSION['user_id'] = $user->getIdUser();
                $_SESSION['blacklist'] = $user->getBlacklist();

                if($user->getRole() === 'admin'){
                    $_SESSION['role'] = "admin";
                    header('Location: ../public/index.php');
                
                }
                else
                {
                    $_SESSION['role'] = "user";
                    header('Location: ../public/index.php'); 
                }

              }
              else
              {
                echo '<script>alert("nom ou mot de passe incorrect")</script>';
              }  
           }
           else
           {
                echo '<script>alert("nom ou mot de passe incorrect")</script>';
           }
        }
        else
        {
            echo '<script>alert("veuillez renseignez les champs obligatoire ( * )")</script>';
        }
    }

    public function disconnectUser()
    {
            session_unset();
            session_destroy();
            header('Location: ../public/index.php');
    }


    public function newUser($data)
    {

        if($_POST['password'] == $_POST['confirmPassword'])
        {
            if(!empty($_POST['userName']) && !empty($_POST['password']))
            {
                $user = new User();
                $verify = $user->existingUser($data);
        

                if(!$verify)
                {
                    if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) 
                    {
                        
                        

                        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
                        
                        $this->userDAO->addUser($_POST);

                        $userId = $this->userDAO->getUserByUserName($_POST['userName']);

                        $_SESSION['userName'] = $_POST['userName'];
                        $_SESSION['user_id'] = $userId->getIdUser();
                        $_SESSION['blacklist'] = "0";
                        $_SESSION['role'] = "user";
                        
                        header('Location: ../public/index.php');             
                    }
                    else
                    {
                        echo '<script>alert("adresse mail non valide")</script>';
                    }   
                }
                else
                {
                    echo '<script>alert("pseudo invalide ou existe deja")</script>';
                }
            }    
            else
            {
                echo '<script>alert("veuillez renseignez les champs obligatoire ( * )")</script>';
            }
        }
        else
        {
            echo '<script>alert("le mot de passe confirmer est different du mot de passe.")</script>';
        }
    }

    public function blacklist($post)
    {   
        $user = $this->userDAO->getUserByUserName($post);

            if($user->getBlacklist() == 0)
            {
               $user->setBlacklist(1);
               $this->userDAO->updateBlacklist($user); 
            }
            else
            {
               $user->setBlacklist(0);
               $this->userDAO->updateBlacklist($user); 
            }


    }

    public function newPassword()
    {

      $user = $this->userDAO->getUserByUserName($_POST['userName']);
        
        if(password_verify($_POST['password'], $user->getPassword())=== true)
        {
            if($_POST['newPassword'] == $_POST['confirmNewPassword'])
            {
                $_POST['newPassword'] = password_hash($_POST['newPassword'], PASSWORD_BCRYPT);

                $this->userDAO->updatePassword($_POST);
                $_SESSION['changePasswordSucces'] = 'Le mot de passe a ete modifie';
                header('Location: ../public/index.php?route=myProfil&userName=' . $_POST['userName']);  

            }
            else
            {
                echo '<script>alert("le nouveau mot de passe confirmer est different du nouveau mot de passe.")</script>';
            }
        }
        else
        {
            echo '<script>alert("le mot de passe est invalide")</script>';
        }
    }

}


