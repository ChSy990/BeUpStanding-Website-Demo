<?php

class Database {
	public $connection = null;

	function connect($user, $password, $database){
		//$this->connection = mysqli_connect('deco3801-Pending.zones.eait.uq.edu.au', $user, $password );
		$this->connection = mysqli_connect('localhost', $user, $password );

		if(!$this->connection){
			die('connection failed: '.mysqli_connect_error());
		}
		$db = mysqli_select_db($this->connection, $database);
		if(!$db){
			die("Cannot use: ".$database);
		}


		return $this->connection;
	}

	function disconnect(){
		mysqli_close($this->connection);
	}


}


?>