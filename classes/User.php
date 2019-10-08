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
     * @return false|PDOStatement
     *
     * Fetches table user from database.
     */
    public static function fetchUsers()
    {
        $conn = Database::pdoConnect();
        $data = $conn->query("select * from user");
        return $data;
    }

    /**
     * @param $data
     *
     * Display update page for user.
     */

    public static function displayUserUpdate($data)
    {
        ?>
        <div class="col-md-12" style="margin-top:2em;">
            <div class="card rounded-0">
                <div class="card-body bg-light">
                    <form class="form" role="form" id="formRegister" method="POST">
                        <?php
                        if ($data !== null)
                            foreach ($data as $row) : ?>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control form-control-lg rounded-0" name="username"
                                           id="user" value="<?= $row['username'] ?>"
                                           required
                                           placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control form-control-lg rounded-0" id="pass"
                                           name="pass" value="<?= $row['password']?>"
                                           required
                                           autocomplete="new-password" placeholder="">
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-lg float-right"
                                        id="btnLogin">
                                    Wijzig
                                </button>
                            <?php
                            endforeach;
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <?php
    }

    /**
     * @param $userID
     * @param $username
     * @param $password
     * @return bool
     *
     * Updates user username or/both password.
     */

    public static function updateUser($userID, $username, $password)
    {
        if (!empty($userID) && !empty($username) && !empty($password)) {
            $conn = Utility::pdoConnect();
            $encryptedpassword = User::encryptPassword($password);
            $update = $conn->prepare("Update user set username = ?, password = ? where id = ?;");
            $update->bindParam(1, $username);
            $update->bindParam(2, $encryptedpassword);
            $update->bindParam(3, $userID);
            $update->execute();
            return true;
        } else {
            return false;
        }
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
                        <td><a href="gebruiker/wijzigen.php?user_id=<?= $row['id'] ?>">
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

    /**
     * @param $userID
     * @return mixed $user_data
     * Fetch an user information based on userID from dashboard_admin.
     */
    public static function fetchUser($userID)
    {
        if (!empty($userID)) {
            $conn = Database::pdoConnect();

            $fetch = $conn->prepare("select * from user where id = :userID");
            $fetch->bindParam(':userID', $userID);
            $fetch->execute();
            if ($fetch->rowCount() == 1) {
                return $fetch->fetchAll();
            }
        }
    }

    /**
     * Checks input data at login screen against user table, sets session username variable and/or admin status variable.
     */
    public function login()
    {
        if (!empty($this->username) && !empty($this->pass)) {
            $conn = Database::pdoConnect();

            $login = $conn->prepare("select * from user where username=:username");
            $login->bindParam(':username', $this->username);
            $login->execute();

            if ($login->rowCount() == 1) {
                $user_data = $login->fetch(PDO::FETCH_ASSOC);
                $hashed_pass = $user_data['password'];

                if (Utility::verifyEncryptedPassword($this->pass, $hashed_pass)) {
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
        $conn = Database::pdoConnect();

        if (!Database::checkIfExists("user", "username", $this->username)) {

            $this->pass = Utility::EncryptPassword($this->pass);
            $register = $conn->prepare("INSERT INTO user (id,username,password) VALUES  ((SELECT UUID()), ?, ?)");
            $register->bindParam(1, $this->username);
            $register->bindParam(2, $this->pass);
            $register->execute();
            return true;
        } else {
            return false;
        }
    }
}