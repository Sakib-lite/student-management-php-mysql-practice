<?php

require_once '../includes/init.php';

Auth::isLoggedIn();

?>


<html>
<head>
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="../includes/css/register-form.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../includes/jquery.js"></script>
    <link rel="stylesheet" href="../view/css/header.css">
</head>
<body>

<div style="w-100">
    <?php include_once '../view/header.php' ?>
    <div class="" container d-flex align-items-center justify-content-center
    ">
    <h1 class="text-center text-4xl text-gray-800 my-10">Welcome <span
                class="ml-3"><?php echo $_SESSION['name']; ?></span></h1>
</div>
</div>


</body>
<style>
    label.error {
        color: #e50000;
    }
</style>

</html>
