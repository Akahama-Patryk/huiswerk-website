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

                    RedirectHandler::HTTP_301('../dashboard/index.php');
                } else {
                    echo "<h4>Username/password incorrect.</h4>";
                }
            } else {
                echo "<h4>Username/password incorrect.</h4>";
            }
        }
    }

    public function register()
    {
        if (!empty($this->username) && !empty($this->pass)) {
            $conn = Utility::pdoConnect();
            $this->pass = self::encryptPassword($this->pass);
            $register = $conn->prepare("INSERT INTO user (id,username,password) VALUES  ((SELECT UUID()), ?, ?)");
            $register->bindParam(1, $this->username);
            $register->bindParam(2, $this->pass);
            $register->execute();
            RedirectHandler::HTTP_301('../index.php');
        }else{
            echo "Mislukt";
        }
    }

    /**
     * @param $pass
     * @param $hashed_pass
     * @return bool
     *
     * Verifies encrypted passwords.
     */
    public
    static function verifyEncryptedPassword($pass, $hashed_pass)
    {
        if (password_verify($pass, $hashed_pass)) {
            return true;
        } else {
            return false;
        }
    }
    public static function encryptPassword($pass)
    {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        return $hashed_pass;
    }
}