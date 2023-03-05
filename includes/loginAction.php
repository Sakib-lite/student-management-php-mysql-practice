<?php
require_once './../includes/init.php';


$db=new Database();
$conn=$db->getConnection();

$user=new User();
$user->login($conn,$_POST);


if (isset($_SESSION["message"])) {
    $message = $_SESSION["message"];
    echo '<div class="bg-gray-200 flex items-center justify-center py-4 text-red-500">' . $message . '</div>';
    unset($_SESSION['message']);
}
