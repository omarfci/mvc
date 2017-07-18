<?php

/**
* 
*/
class Login_Model extends Model
{
	
	public function __construct(){
		parent:: __construct();
	}

	public function run(){

		$stat = $this->db->prepare("SELECT id, role FROM users WHERE login = :login 
						  AND password = MD5(:password)");
		$stat->execute(array(
				':login' => $_POST['login'],
				':password' => $_POST['password']
			));

		$data = $stat->fetch();

		// print_r($data);
		// die;

		//$data = $stat->fetchAll();
		$count = $stat->rowcount();
		
		if($count > 0){
			//login
			Session::init();
			Session::set('role', $data['role']);
			Session::set('loggedIn', true);
			header('location: ../dashboard');

		}else{
			//Show error
			header('location: ../login');
		}	
	}
}