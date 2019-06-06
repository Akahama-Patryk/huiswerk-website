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
     *   Fetches subjects.
     */
    public static function fetchSubjects()
    {
        $conn = Utility::pdoConnect();
        $fetch = $conn->query("SELECT * FROM subjects");
        return $fetch;
    }

    /**
     * @return false|PDOStatement
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
     *  Displays users.
     */
    public static function displayUsers($data)
    {
        ?>
        <div class="container">
            <div class='col-md-12'>
                <form method="get">
                    <table class='table'>
                        <thead class='thead-light'>
                        <tr>
                            <th scope='col'>Gebruikers naam</th>
                            <th scope='col'>Gebruikers wachtwoord</th>
                            <th scope='col'>Gebruiker wijzig</th>
                            <th scope='col'>Gebruiker verwijder</th>
                        </tr>
                        <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><a href="<?= $row['id'] ?>">
                                        Wijzig
                                    </a></td>
                                <td><a href="<?= $row['id'] ?>">
                                        Verwijder
                                    </a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <?php
    }
}