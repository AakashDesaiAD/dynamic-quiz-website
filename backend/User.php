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
}
?>