<?php
	
	/**
	 * Class Utility
	 */
	class Utility
	{
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
		 * @param $pass
		 * @return mixed
		 *
		 * Encrypts passwords.
		 */
		public static function EncryptPassword($pass)
		{
			$hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
			return $hashed_pass;
		}
		
		/**
		 * @param $pass
		 * @param $hashed_pass
		 * @return bool
		 *
		 * Verifies encrypted passwords.
		 */
		public static function VerifyEncryptedPassword($pass, $hashed_pass)
		{
			if (password_verify($pass, $hashed_pass)) {
				return true;
			} else {
				return false;
			}
		}
	}