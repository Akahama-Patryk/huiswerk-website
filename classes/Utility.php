<?php

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
            $conn = new PDO("mysql:host=$servername;dbname=huiswerk_website", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            $conn = null;
        }
        return $conn;
    }
}