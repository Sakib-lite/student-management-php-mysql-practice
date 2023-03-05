<?php


require_once '../../includes/init.php';

Auth::isLoggedIn();
$urlObj=new Url();

$urlObj->checkURL('/student-management/pages/teacher/create-teacher-profile',$_SERVER);
?>
<html>
<head>
    <title>Teacher Registration Form</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../includes/jquery.js"></script>
    <link rel="stylesheet" href="../../view/css/header.css">
</head>
<body >

<div class="w-100">

    <?php include_once '../../view/header.php' ?>
    <?php include_once '../../view/teacher-form.php' ?>
</div>


</body>
<style>
    label.error {
        color: #e50000;
    }
</style>
<script>
    $.validator.addMethod("checkMobileNumberLength", function (value, element) {
        return value.length === 11
    }, 'Please enter 11 digit mobile number.');


    $('#teacher-profile-form').validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            mobile: {
                required: true,
                checkMobileNumberLength: true
            },

        },
        messages: {
            name: {
                required: 'Please enter Full name.'
            },

            email: {
                required: 'Please enter Email Address.',
                email: 'Please enter a valid Email Address.',
            },
            mobile: {
                required: 'Please enter mobile number.'
            },

        },
        submitHandler: function (form) {
            form.submit();
        }
    });
</script>
</html>