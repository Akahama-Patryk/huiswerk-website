<?php
	
	class Database
	{
		/**
		 * @param string $servername
		 * @param string $username
		 * @param null $password
		 * @return PDO
		 *
		 *  Connects Server to database using PDO.
		 */
		public static function pdoConnect($servername = "localhost", $username = "root", $password = NULL)
		{
			try {
				$conn = new PDO("mysql:host=$servername;dbname=project_huiswerk", $username, $password);
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
				$conn = null;
			}
			return $conn;
		}
		
		/**
		 * @param $table
		 *  string Name of table to access.
		 * @param $column
		 *  string Name of column in table to use.
		 * @param $del_id
		 *  mixed Id of item in table to delete.
		 *
		 * Deletes row from mysql table.
		 */
		static public function deleteRow($table, $column, $del_id)
		{
			$conn = Database::pdoConnect();
			$del = $conn->prepare("DELETE FROM $table WHERE $column = ?;");
			$del->bindParam(1, $del_id);
			$del->execute();
		}
		
		/**
		/**
		 * @param $table
		 *  string Name of table to access.
		 * @param $column
		 *  string Name of column in table to use.
		 * @param $item
		 *  string Name of item to check if exists.
		 * @return bool
		 *
		 *  Checks if item exists in column in table.
		 */
		public static function checkIfExists($table, $column, $item)
		{
			$conn = Database::pdoConnect();
			$exists = $conn->prepare("SELECT $column FROM $table WHERE $column = '$item'");
			$exists->execute();
			
			if ($exists->fetchAll() >= 0) {
				return true;
			} else {
				return false;
			}
		}
		
		/**
		 * @return false|PDOStatement
		 *  Fetches subjects from db.
		 */
		public static function fetchSubjects()
		{
			$conn = Database::pdoConnect();
			$fetch = $conn->query("SELECT * FROM subjects");
			return $fetch;
		}
	}