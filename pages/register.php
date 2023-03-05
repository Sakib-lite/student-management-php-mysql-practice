<?php


require_once '../includes/init.php';
$urlObj=new Url();

$urlObj->checkURL('/student-management/pages/register',$_SERVER);

?>
<html>
<head>
    <title>Student Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../includes/jquery.js"></script>
    <link rel="stylesheet" href="../view/css/header.css">
</head>
<body style="background-color: rgba(250,250,250,0.79);">

<div class="w-100">
    <?php include_once '../view/header.php' ?>

    <?php include_once '../view/register-form.php' ?>
</div>


</body>
<style>
    label.error {
        color: #e50000;
    }
</style>

</html>