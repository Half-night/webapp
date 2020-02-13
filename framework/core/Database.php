<?php

class Database
{

	private static $instance = null;
	private $connection = null;
	private $config = null;

	private function __construct() {}

	private function __clone() {}

	public static function getInstance() {
		if (self::$instance === null) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function connect() {
		
		$this->config = Config::get('mysql');
		$this->connection = new Mysqli($this->config['host'], $this->config['user'], $this->config['password'], $this->config['db_name']);
	}

	public function disconnect() {

		$this->connection->close();
		$this->connection = null;
	}

	public function query($query) {

		//TODO: rewrite this method
		if ($this->connection instanceof Mysqli) {

			$result = $this->connection->query($query);

			if (!$this->connection->errno) {

				if ($result === true) {

					return true;
				} else {
					
					return $this->prepare_result($result);
				}
			} else {

				die($this->connection->error);
			}

		} else {

			return false;
		}
	}

	public function multi_query($query) {

		//TODO: rewrite this method
		if ($this->connection instanceof Mysqli) {

			$result = $this->connection->multi_query($query);

			if (!$this->connection->errno) {
					
				return $result;

			} else {

				die($this->connection->error);
			}

		} else {

			return false;
		}
	}

	private function prepare_result($result) {

		$result_array = array();

		while ($row = $result->fetch_assoc()) {

			$result_array[] = $row;
		}

		return $result_array;
	}
}