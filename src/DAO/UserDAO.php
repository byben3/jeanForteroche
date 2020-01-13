<?php

namespace App\src\DAO;

use App\src\model\User;

class UserDAO extends DAO
{


	public function getUsers()
	{
		$sql = 'SELECT * FROM user ORDER BY idUser';
		$result = $this->sql($sql);
		$users = [];
		foreach ($result as $row) {
			$userId = $row['idUser'];
			$users[$userId] = $this->buildObject($row);
		}
		return $users;
	}

	public function getUserByUserName($userName)
	{
		$sql = "SELECT * FROM user WHERE userName = '$userName'";
		$result = $this->sql($sql);
		$data = $result->fetch();

		if($data !== false)
		{
			return $user = $this->buildObject($data);
		}
		
        
		return $result->fetch();
	}

	public function addUser($userInfo)
	{
		extract($userInfo);
		$firstName = htmlspecialchars($_POST['firstName']);
		$lastName = htmlspecialchars($_POST['lastName']);
		$userName = htmlspecialchars($_POST['userName']);
		$city = htmlspecialchars($_POST['city']);
		$country = htmlspecialchars($_POST['country']);
	    $sql = 'INSERT INTO user (firstName ,lastName ,userName ,mail ,password ,role ,blacklist ,dateCreate ,birthday ,city ,country) VALUES (? ,? ,? ,? ,? ,"user" ,0 ,NOW() ,? ,? ,?)';
		$this->sql($sql, [$firstName ,$lastName ,$userName ,$mail ,$password ,$birthday ,$city ,$country]);
	}

	public function updateBlacklist($data)
	{
		$blacklist = $data->getBlacklist();
        $id = $data->getIdUser();

		$sql = "UPDATE user SET blacklist='$blacklist' WHERE idUser = '$id'";
		$this->sql($sql);
	}

	public function updatePassword($data)
	{
		
		$password = $_POST['newPassword'];
		$id = $_POST['user_id'];
		$sql = "UPDATE user SET password='$password' WHERE idUser = '$id'";
		$this->sql($sql);
	
	}



    private function buildObject(array $row)
    {
        $user = new User();
        $user->setIdUser($row['idUser']);
        $user->setUserName($row['userName']);
       	$user->setFirstName($row['firstName']);
       	$user->setLastName($row['lastName']);
       	$user->setMail($row['mail']);
       	$user->setPassword($row['password']);
       	$user->setRole($row['role']);
       	$user->setBlacklist($row['blacklist']);
       	$user->setDateCreate($row['dateCreate']);
       	$user->setBirthday($row['birthday']);
       	$user->setCity($row['city']);
       	$user->setCountry($row['country']);

        return $user;
    }

}
