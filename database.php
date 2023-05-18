<?php
class database
{
	public $connection;
	public $query;

	//constructor
	public function __construct($server = 'localhost', $user = 'root', $password = '', $dbName = '')
	{
		$this->connection = new mysqli($server, $user, $password, $dbName);
		if ($this->connection->connect_error) {
			$this->error('Failed to connect to MySQL -' . $this->connection->connect_error);
		}
	}
	//insert data dynamic return query
	public function insertData($table, $data)
	{
		$key = array_keys($data);
		$val = array_values($data);
		$sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
		. "VALUES (" . implode(", ", $val) . ")";
		$this->query = ($sql);
	}
	//select data dynamic return query
	public function selectData($table, $data, $where)
	{
		$data = $this->dataFor($data);
		$key = array_keys($data);
		$sql = "SELECT " . implode(', ', $key) . " "
		. "FROM (" . implode(",", $table) . ") WHERE $where";
		$this->query = $sql;
	}
	//delete table dynamic return query
	public function deleteData($table,  $where)
	{
		$sql = "DELETE FROM $table WHERE $where";
		$this->query = $sql;
	}
	//update data dynamic return query
	function updateData($table, $data, $where)
	{
		$cols = array();
		foreach ($data as $key => $val) {
			$cols[] = "$key = '$val'";
		}
		$sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
		$this->query = $sql;
	}

	public function error($error)
	{
		if ($this->show_errors) {
			exit($error);
		}
	}
	public function dataFor($data)
	{
		$arr = array();
		foreach ($data as $d) {
			$arr[$d] = $d;
		}
		return $arr;
	}
}

