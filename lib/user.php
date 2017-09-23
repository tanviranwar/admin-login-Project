<?php
	include_once 'lib/session.php';
	include 'lib/database.php';

class user{
	private $db;
	public function __construct(){
		$this->db =new database();
	}

	public function userRegistration($data){
		$name = $data['name'];
		$username = $data['username'];
		$email = $data['email'];
		$password = md5($data['password']);

		$chk_email = $this->emailCheck($email);

		if ($name == "" OR $username == "" OR $email == "" OR $password == "") {
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> :Field not be empty</div>";
			return $msg;
		}

		if (strlen($username) < 4) {
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> username is too short</div>";
			return $msg;
		}

		if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> email is not valid</div>";
			return $msg;
		}
		if ($chk_email == true) {
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> email is already exists!</div>";
			return $msg;
		}
		$sql = "INSERT INTO tbl_user (name, username, email, password) VALUES(:name, :username, :email, :password)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name', $name);
		$query->bindValue(':username', $username);
		$query->bindValue(':email', $email);
		$query->bindValue(':password', $password);
		$result = $query->execute();
		if ($result) {
			$msg = "<div class='alert alert-success'><strong>Success !</strong>You have been registered successfully</div>";
			return $msg;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Please give valid data.</div>";
			return $msg;
		}

	}

	public function emailCheck($email){
		$sql = "SELECT email FROM tbl_user WHERE email = :email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email', $email);
		$query->execute();
		if ($query->rowCount() > 0) {
			return true;			
		}else{
			return false;
		}
	}

	public function getLoginUser($email, $password){
		$sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password LIMIT 1";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email', $email);
		$query->bindValue(':password', $password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function userLogin($data){

		$email = $data['email'];
		$password = md5($data['password']);

		$chk_email = $this->emailCheck($email);

		if ($email == "" OR $password == "") {
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> :Field not be empty</div>";
			return $msg;
		}
			if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> email is not valid</div>";
			return $msg;
		}
		if ($chk_email == false) {
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong> email is already exists!</div>";
			return $msg;
		}
		$result = $this->getLoginUser($email, $password);
		if ($result) {
			session::init();
			session::set("login",true);	
			session::set("id",$result->id);	
			session::set("name",$result->name);	
			session::set("username",$result->username);	
			session::set("loginmsg","<div class='alert alert-success'><strong>Success ! </strong> You are loggedin!</div>");
			header("Location: index.php");	
			}else{
				$msg = "<div class='alert alert-danger'><strong>Error ! </strong> Data not found!</div>";
			return $msg;
			}	
	}

}


?>  