<?php
require_once './init.php';

if (isset($_POST['name'])) {

    $db = new Database();
    $conn = $db->getConnection();


    $courseObj = new Course();
    $courseObj->createCourse($conn, $_POST);


}




