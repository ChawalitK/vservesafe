<?php

	/*
	Revised code by Dominick Lee
	Original code derived from "Essential PHP Security" by Chriss Shiflett
	Last Modified 2/27/2017


	CREATE TABLE sessions
	(
		id varchar(32) NOT NULL,
		access int(10) unsigned,
		data text,
		PRIMARY KEY (id)
	);

	+--------+------------------+------+-----+---------+-------+
	| Field  | Type             | Null | Key | Default | Extra |
	+--------+------------------+------+-----+---------+-------+
	| id     | varchar(32)      |      | PRI |         |       |
	| access | int(10) unsigned | YES  |     | NULL    |       |
	| data   | text             | YES  |     | NULL    |       |
	+--------+------------------+------+-----+---------+-------+

	*/


class Session {
	private $db;
	private $db_handle;

	public function __construct(){
		// Instantiate new Database object
		$this->db = new Database;
    $this->db_handle = new DBController();

		// Set handler to overide SESSION
		session_set_save_handler(
			array($this, "_open"),
			array($this, "_close"),
			array($this, "_read"),
			array($this, "_write"),
			array($this, "_destroy"),
			array($this, "_gc")
		);

		// Start the session
		session_start();
	}
	public function _open(){
		echo "1<br>";
		// If successful
		if($this->db_handle)
		{
			// Return True
			return true;
		}
		// Return False
		return false;
	}
	public function _close(){
		echo "2<br>";
		// Close the database connection
		// If successful
		if($this->db_handle->close())
		{
			// Return True
			return true;
		}
		// Return False
		return false;
	}

	function _read($id) {
		$query = "SELECT data FROM sessions WHERE id = ? limit 1";
		$paramType = "s";
		$paramValue = array(
				$id
		);
		
		$result = $this->db_handle->runQuery($query, $paramType, $paramValue);

		if(isset($result[0]['data']) && strlen($result[0]['data']) > 0){
			return $result[0]['data'];
		}

		return '';
	}

	public function _write($id, $data) {
		$access = time();
		$query = "REPLACE INTO sessions VALUES (?, ?, ?)";
		$paramType = "sss";
		$paramValue = array(
				$id,
				$access,
				$data
		);

		$effactRows = $this->db_handle->replace($query, $paramType, $paramValue);

		if($effactRows > 0)
		{
			// Return True
			return true;
		}
		// Return False
		return false;

	}

	public function _destroy($id){
		echo "5<br>";
		// Set query
		$this->db->query('DELETE FROM sessions WHERE id = :id');
		// Bind data
		$this->db->bind(':id', $id);
		// Attempt execution
		// If successful
		if($this->db->execute())
		{
			// Return True
			return true;
		}
		// Return False
		return false;
	} 
	public function _gc($max){
		echo "6<br>";
		// Calculate what is to be deemed old
		$old = time() - $max;
		// Set query
		$this->db->query('DELETE FROM sessions WHERE access < :old');
		// Bind data
		$this->db->bind(':old', $old);
		// Attempt execution
		if($this->db->execute())
		{
			// Return True
			return true;
		}
		// Return False
		return false;
	}
}
?>
