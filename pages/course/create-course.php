<?php


require_once '../../includes/init.php';
Auth::isLoggedIn();
$urlObj=new Url();

$urlObj->checkURL('/student-management/pages/course/create-course',$_SERVER);
?>
<html>
<head>
    <title>Student Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!--    <script src="includes/jquery.js"></script>-->
    <link rel="stylesheet" href="../../view/css/header.css">
    <style>
        label.error {
            color: #e50000;
        }
    </style>
    <?php include_once  '../../view/css/snackbar.php'?>
</head>
<body>

<div class="w-100">

    <?php include_once '../../view/header.php' ?>
    <div id="snackbar_success" class="d-flex align-items-center justify-content-center"></div>

    <?php include_once '../../view/create-course-form.php' ?>

</div>


</body>

<?php //include_once ?>
<script>
    $.validator.addMethod("checkMobileNumberLength", function (value, element) {
        return value.length === 11
    }, 'Please enter 11 digit mobile number.');


    $('#create-course-from').validate({
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            credit: {
                required: true,
                min: 1,
                max: 5
            },
            description: {
                required: true,
                minlength: 5
            },

        },
        messages: {
            name: {
                required: 'Please enter course name.'
            },

            credit: {
                required: 'Please enter course credit.',
                min: "Minimum course 1",
                max: "Maximum course 5"
            },
            description: {
                required: 'Please enter course description'
            },

        },
        submitHandler: function (form) {
            form.submit();
        }
    });
</script>
</html>