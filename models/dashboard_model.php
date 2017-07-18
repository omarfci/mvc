<?php

class Dashboard_Model extends Model
{
	function __construct(){
		parent::__construct();
	}

	function xhrInsert(){
		$text = $_POST['text'];

		$stt = $this->db->prepare('INSERT INTO data (text) VALUES (:text)');
		$stt->execute(array(':text' => $text));

		$data = array('text' => $text, 'id' => $this->db->lastInsertId());
		echo json_encode($data);
	}

	function xhrGetListing(){

		$stt = $this->db->prepare('SELECT * FROM data');
		$stt->setFetchMode(PDO::FETCH_ASSOC);
		$stt->execute();
		$data = $stt->fetchall();

		echo json_encode($data);
		
	}

	function delete(){

		$id = $_POST['id'];
		$stt = $this->db->prepare('DELETE FROM data WHERE id="'.$id.'"');
		$stt->execute();
	}

	
}