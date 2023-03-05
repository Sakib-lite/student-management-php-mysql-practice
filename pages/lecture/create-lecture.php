<?php


require_once '../../includes/init.php';
Auth::isLoggedIn();
$urlObj=new Url();

$urlObj->checkURL('/student-management/pages/lecture/create-lecture',$_SERVER);
?>
<html>
<head>
    <title>Student Management System</title>
    <!--    <link rel="stylesheet" href="../../includes/css/register-form.css">-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


    <script src="../../includes/jquery.js"></script>
    <link rel="stylesheet" href="../../view/css/header.css">
    <?php include_once './../../view/css/snackbar.php' ?>
</head>
<body>

<div class="w-100">
    <?php include_once '../../view/header.php' ?>
    <div id="snackbar_success" class="d-flex align-items-center justify-content-center"></div>
    <div id="snackbar_error" class="d-flex align-items-center justify-content-center"></div>
    <?php include_once '../../view/lecture-form.php' ?>
</div>


</body>
<style>
    label.error {
        color: #e50000;
    }
</style>
<script>
    $(document).ready(function () {
        $('#course').change(function () {
            var courseId = $('#course').val();
            $.ajax({
                url: 'get_course_teachers.php',
                type: 'POST',
                data: {'course_id': courseId},
                success: function (response) {
                    $('#teacher').html(response);
                }
            });
        });


        jQuery.validator.addMethod('courseCheck', function (value) {
            var selectedValue = $('#course').val();
            if (selectedValue === '' || selectedValue === null) return false
            console.log('course', selectedValue)
            return true
        }, "Select course field");

        jQuery.validator.addMethod('teacherCheck', function (value) {
            var selectedValue = $('#teacher').val();
            if (selectedValue === '' || selectedValue === null) return false
            console.log('teacher', selectedValue)
            return true
        }, "Select teacher field");


        $('#create-lecture-form').validate({
            rules: {
                title: {
                    required: true,
                    minlength: 5
                },
                description: {
                    required: true,
                    minlength: 5
                },
                course: {
                    courseCheck: true,
                },
                teacher: {
                    teacherCheck: true
                }


            },
            messages: {
                title: {
                    required: 'Please enter lecture title.',
                    minlength: "Minimum length 5"
                },

                description: {
                    required: 'Please enter description.',
                    minlength: "Minimum length 5"
                },


            },
            submitHandler: function (form) {
                form.submit();
            }
        });


    });
</script>
</html>