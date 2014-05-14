<?php
	
	class myBBDD {

		private $host = "localhost";
		private $user = "root";
		private $password = "";
		private $database = "db_rptriggers";
		private $link;
		private $statement;

		function __construct(){
			$this -> conectar();
		}


		function conectar(){

			$this -> link = mysql_connect($this -> host, $this -> user, $this -> password);
			@mysql_select_db($this -> database, $this -> link);
		}


		function consulta($query){
			$this -> statement = mysql_query($query);
			return $this -> statement;
		}

		function insert($query){
			$this -> statement = mysql_query($query);
			return $this -> statement;
		}

		function update($query){
			$this -> statement = mysql_query($query);
			return $this -> statement;
		}

	}


?>