<?php

include_once './init.php';

if(isset($_POST['email'])){

    $db = new Database();
    $conn = $db->getConnection();

    $teacher=new Teacher();
    $teacher->createTeacherProfile($conn,$_POST);

}
