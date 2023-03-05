<?php

class Url
{

    public function checkURL($urlMatch, $server)
    {
        $uri = $server['REQUEST_URI'];

        if ($uri !== $urlMatch) {
            // Redirect to an error page or show an error message
            header("Location:http://localhost/student-management/pages/error-page.php");

            exit();
        }
    }
}