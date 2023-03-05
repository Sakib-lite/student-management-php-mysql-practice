<?php

class Auth
{

    public static function isLoggedIn()
    {

        if (isset($_SESSION['is_Logged_in']) == false) {
            header('Location:http://localhost/student-management/pages/login.php');

        }



    }


}
