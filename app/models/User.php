<?php 

	//this class will initiate db connection
	// instantiate it
	// and will interact with it returning all the users inside an array of objects
	class User {
		private $db; //var to instantiate our db connection

		public function __construct() {
			$this->db = new Database; //instantiating our db connection
		}

		//we have a 'model' method inside Controller that creates an instance of a model 
		// provided in parameters and returns it
		//We need a method that interacts with 'users' model which was created this way 
		public function getUsers() {
			$this->db->query("SELECT * FROM users");
			$result = $this->db->resultSet();
			return $result;
		}
	}