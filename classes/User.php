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
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			}
			return false;
		}

		/**
		 * @return bool
		 *  Registers users and encrypts password using hash
		 */
		public function register()
		{
			if (!empty($this->username) && !empty($this->pass)) {
				$conn = Utility::pdoConnect();
				$this->pass = User::encryptPassword($this->pass);
				$register = $conn->prepare("INSERT INTO user (id,username,password) VALUES  ((SELECT UUID()), ?, ?)");
				$register->bindParam(1, $this->username);
				$register->bindParam(2, $this->pass);
				$register->execute();
				return true;
			} else {
				return false;
			}
		}

		/**
		 * @param $user_id
		 *  int User id.
		 *
		 * Removes user from user table in database.
		 */
		public function remove($user_id)
		{

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

		/**
		 * @return false|PDOStatement
		 *
		 * Fetches table user from database.
		 */
		public static function fetchUsers()
		{
			$conn = Utility::pdoConnect();
			$data = $conn->query("select * from user");
			return $data;
		}

		/**\
		 * @param $data
		 *
		 *  Displays users in table.
		 */
		public static function displayUsers($data)
		{
			?>
            <div class="table-responsive">
                <table class='table table-sm'>
                    <thead class='thead-light'>
                    <tr>
                        <th scope='col'>Naam</th>
                        <th scope='col'>Wijzig</th>
                        <th scope='col'>Verwijder</th>
                    </tr>
                    <tbody>
					<?php foreach ($data as $row) : ?>
                        <tr>
                            <td><?= $row['username'] ?></td>
                            <td><a href="gebruiker/wijzigen.php<?= $row['id'] ?>">
                                    <i class="far fa-edit"></i>
                                </a></td>
                            <td><a href="dashboardhandler.php?user_del_id=<?= $row['id'] ?>">
                                    <i class="fas fa-times"></i>
                                </a></td>
                        </tr>
					<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
			<?php
		}
	}