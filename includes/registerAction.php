<?php
require_once '../includes/init.php';

if (isset($_POST['email'])) {
    $db = new Database();
    $conn = $db->getConnection();

    $user = new User();
    $user->register($conn, $_POST);
}
