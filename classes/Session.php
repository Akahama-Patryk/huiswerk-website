<?php

/**
 * Class Session
 */
class Session
{
    /**
     * Starts session if not already started.
     */
    public static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Logs user out and redirects to Home.php .
     */
    public static function logOut()
    {
        if (Session::loginStatus()) {
            session_destroy();
            RedirectHandler::HTTP_301('index.php');
        } else {
            RedirectHandler::HTTP_301('index.php');
        }
    }

    /**
     * @return bool
     *
     * Checks login status.
     */
    public static function loginStatus()
    {
        if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == true) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return bool
     *
     * Checks admin status.
     *
     */
    public static function adminStatus()
    {
        if (isset($_SESSION['login_admin_status']) && $_SESSION['login_admin_status'] == true) {
            return true;
        } else {
            return false;
        }
    }
}