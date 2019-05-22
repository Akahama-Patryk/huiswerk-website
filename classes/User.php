<?php
	
	/**
	 * Class User
	 */
	class User
	{
		/**
		 * @var
		 * string Username.
		 */
		protected $username;
		
		/**
		 * @var
		 *  string Password.
		 */
		protected $pass;
		
		/**
		 * User constructor.
		 * @param $username
		 * @param $pass
		 */
		public function __construct($username, $pass)
		{
			$this->username = $username;
			$this->pass = $pass;
		}
		
		/**
		 * Checks input data at login screen against user table, sets session username variable and/or admin status variable.
		 */
		public function login()
		{
			
			if (!empty($this->username) && !empty($this->pass)) {
				$conn = Utility::pdoConnect();
				
				$login = $conn->prepare("select * from user where username=:username");
				$login->bindParam(':username', $this->username);
				$login->execute();
				
				if ($login->rowCount() == 1) {
					$user_data = $login->fetch(PDO::FETCH_ASSOC);
					$hashed_pass = $user_data['password'];
					
					if (User::verifyEncryptedPassword($this->pass, $hashed_pass)) {
						// Password verified, user has been logged in.
						$_SESSION['login_status'] = true;
						$_SESSION['login_user'] = $user_data['username'];
						
						RedirectHandler::HTTP_301('../index.php');
					} else {
						echo "<h4>Gebruikersnaam of wachtwoord is onjuist.</h4>";
					}
				} else {
					echo "<h4>Gebruikersnaam of wachtwoord is onjuist.</h4>";
				}
			}
		}
		
		/**
		 * @param $pass
		 * @param $hashed_pass
		 * @return bool
		 *
		 * Verifies encrypted passwords.
		 */
		public static function verifyEncryptedPassword($pass, $hashed_pass)
		{
			if (password_verify($pass, $hashed_pass)) {
				return true;
			} else {
				return false;
			}
		}
	}