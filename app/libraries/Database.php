<?php 
	//this will establish connection with database and some pdo methods
	//database params are already defined in config.php but no values where added,
	//after adding those values:
	//--creation connection to database
	class Database {
		private $dbHost = DB_HOST;
		private $dbUser = DB_USER;
		private $dbPass = DB_PASS;
		private $dbName = DB_NAME;

		private $statement; 
		private $dbHandler; //when statement is prepared, this property will be used
		private $error;

		public function __construct() {
			$conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
			$options = array(
				//provide timeouts while connect* + check if connected
				PDO::ATTR_PERSISTENT => true, 
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
			);
			try {
				//instantiating our pdo class
				$this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
			} catch (PDOException $e) {
				$this->error = $e->getMessage();
				echo $this->error;
			}
		} //here we can test it with a model 'User' for example as I did

		//Allow writing queries
		public function query($sql) {
			$this->statement = $this->dbHandler->prepare($sql);
		}

		//bind values
		public function bind($parameter, $value, $type = null) {
			switch (is_null($type)) {
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;				
				default:
					$type = PDO::PARAM_STR;
			}
			$this->statement->bindValue($parameter, $value, $type);
		}

		//Executing prepared statement
		private function execute() {
			return $this->statement->execute();
		}

		//Returning an array of objects with all result sets
		public function resultSet() {
			$this->execute();
			return $this->statement->fetchAll(PDO::FETCH_OBJ);
		}

		//return a specific row as obj when login request
		public function single() {
			$this->execute();
			//fetch next row from the result set
			return $this->statement->fetch(PDO::FETCH_OBJ);

		}

		//Get the row count
		public function rowCount() {
			return $this->statement->rowCount();
		}
	}


