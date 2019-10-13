<?php
include_once 'dbconnection.php';
class Users {
	private $conn;
	
	
	public $id;
	public $name;
	public $email;
	public $password;
	
	public function __construct($db)
	{
		$this->conn=$db;
	}
	



public function u() {
	
	if (isset($_SESSION['login'])) {
                $query = $pdo->prepare("SELECT id FROM users ");
                $user_id=$query->execute();
                $_SESSION['usr_id']['id']=$user_id;
				$query -> bindValue(1, $id);
                $query -> bindValue(2, $_SESSION['user_id']['id']);
	
	
	
}
}