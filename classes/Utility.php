<?php
	
	/**
	 * Class Utility
	 */
	class Utility
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
		 * @return false|PDOStatement
		 *  Fetches subjects from db.
		 */
		public static function fetchSubjects()
		{
			$conn = Utility::pdoConnect();
			$fetch = $conn->query("SELECT * FROM subjects");
			return $fetch;
		}
		
		/**
		 * @return false|string
		 *  Fetches and returns current date/time in dutch locale.
		 */
		public static function fetchCurrentDateTime()
		{
			// Set locale to dutch for date.
			setlocale(LC_TIME, 'NL_nl');
			// Get current date for filter.
			$current_date_filter = date("Y-m-d");
			
			return $current_date_filter;
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
			if (!empty($del_id)) {
				$conn = Utility::pdoConnect();
				$del = $conn->prepare("DELETE FROM $table WHERE $column = ?;");
				$del->bindParam(1, $del_id);
				$del->execute();
			} else {
				http_response_code(405);
			}
		}
	}