<?php

/**
* 
*/
class User_Model extends Model
{
	
	public function __construct(){
		parent:: __construct();
	}

	public function userList(){

		$stt = $this->db->prepare('SELECT id, login, role FROM users');
		$stt->execute();
		return $stt->fetchAll();
	}


	public function listUser($id){

		$stt = $this->db->prepare('SELECT id, login, role FROM users WHERE id = :id');
		$stt->execute(array(':id' => $id));
		return $stt->fetch();
	}



	public function insert($data){

		$stt = $this->db->prepare('INSERT INTO users
			(`login`, `password`, `role`)
			VALUES (:login, :password, :role)
			');
		$stt->execute(array(
			':login' => $data['login'],
			':password' => $data['password'],
			':role' => $data['role']
		));
		return $stt->fetchAll();
	}

	public function update($data){

		$stt = $this->db->prepare('
				SET `login` = :login, `password` = :password, `role` = :role
				WHERE id = :id
			');
		$stt->execute(array(
			':id' => $data['id'],
			':login' => $data['login'],
			':password' => $data['password'],
			':role' => $data['role']
		));
	}


	public function delete($id){

		$stt = $this->db->prepare('DELETE FROM users WHERE id = :id');
		$stt->execute(array(
			':id' => $id
		));
	}

}