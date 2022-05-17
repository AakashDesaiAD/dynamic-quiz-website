<?php

include_once ('Dbconnect.php');

class User extends Dbconnect {

	public function __construct() 
    { 
        parent::__construct();        
    } 

	public function login($data)
	{
		$response = [];
		$email = $data['email'];
		$password = $data['password'];

		$statement = $this->connection->query("SELECT * FROM user WHERE email = '{$email}'");
		$userData = $statement->fetch_assoc();
		if ($userData) {
			if (password_verify($password, $userData['password'])) {
				session_start();
				$_SESSION['email'] = $email;
				header("location: ./index.php");
			} else {
				$response['globalError'] = "Please enter valid password";
			}
		} else {
			$response['globalError'] = 'Account not found, please sign up.';
		}

		return $response;
	}

	public function signUp($data)
	{
		$response = [];
		$name = $data['name'];
		$email = $data['email'];
		$password = password_hash($data['password'], PASSWORD_DEFAULT);

		$query = "INSERT INTO user (id, name, email, password) VALUES (NULL, '{$name}', '{$email}', '{$password}')";
		$statement = $this->connection->query($query);

		if ($statement) {
			$response['status'] = true;
			session_start();
			$_SESSION['email'] = $email;
			header("location: ./index.php");
		} else {
			$response['status'] = false;
		}

		return $response;
	}

	public function getUserByEmail($email)
	{
		return $statement = $this->connection->query("SELECT * FROM user WHERE email = '{$email}'");
	}
}
?>