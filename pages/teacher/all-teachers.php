<?php


require_once '../../includes/init.php';

Auth::isLoggedIn();
$urlObj=new Url();

$urlObj->checkURL('/student-management/pages/teacher/all-teachers',$_SERVER);
?>
<html>
<head>
    <title>Teachers Profile</title>




    <?php include_once  '../../view/header-styles.php' ?>
<!--    <link rel="stylesheet" type="text/css" href="../../view/css/header.css">-->
</head>
<body>








    <?php include_once '../../view/header.php' ?>
    <?php include_once '../../view/teachers-table.php' ?>
</div>


</body>


</html>