<!-- Database Connection using Singleton pattern -->

<?php

class DBConnection {
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "php_course";

	private $connection;

	static $db_connection = null;

	private function __construct() {
		$this->connection = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

		if ($this->connection->connect_error) {
		    die("Connection failed: " . $this->connection->connect_error);
		}
	}

	public static function get_instance () {
		if (is_null(self::$db_connection)) {
			self::$db_connection = new DBConnection();			
		}

		return self::$db_connection;
	}


	public function get_connection () {
		return $this->connection;
	}
}

?>