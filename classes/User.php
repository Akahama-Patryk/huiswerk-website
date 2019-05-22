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
		protected $user_name;
		
		/**
		 * @var
		 *  string Password.
		 */
		protected $pass;
		
		/**
		 * User constructor.
		 * @param $user_name
		 * @param $pass
		 */
		public function __construct($user_name, $pass)
		{
			$this->user_name = $user_name;
			$this->pass = $pass;
		}
		
		/**
		 * Checks input data at login screen against user table, sets session username variable and/or admin status variable.
		 */
		public function login()
		{
			
			if (!empty($this->user_name) && !empty($this->pass)) {
				$conn = Utility::pdoConnect();
				
				$login = $conn->prepare("select * from gebruikers where gebruiker_gebruikersnaam=:user_name");
				$login->bindParam(':user_name', $this->user_name);
				$login->execute();
				
				if ($login->rowCount() == 1) {
					$user_data = $login->fetch(PDO::FETCH_ASSOC);
					$hashed_pass = $user_data['gebruiker_wachtwoord'];
					$admin_status = $user_data['gebruiker_admin_status'];
					
					if (Utility::verifyEncryptedPassword($this->pass, $hashed_pass)) {
						// Password verified, user has been logged in.
						$_SESSION['login_status'] = true;
						$_SESSION['login_user'] = $user_data['gebuiker_gebruikersnaam'];
						
						if ($admin_status == 1) {
							// Admin status verified, user has been logged in as admin.
							$_SESSION['login_admin_status'] = true;
							
						} else {
							$_SESSION['login_admin_status'] = false;
						}
						//TODO met patryk framework redirect doen.
						header('Location: Home.php');
						die;
					} else {
						echo "<h4>Gebruikersnaam of wachtwoord is onjuist.</h4>";
					}
				} else {
					echo "<h4>Gebruikersnaam of wachtwoord is onjuist.</h4>";
				}
			}
		}
	}