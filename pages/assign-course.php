<?php


require_once '../includes/init.php';
Auth::isLoggedIn();
$urlObj=new Url();

$urlObj->checkURL('/student-management/pages/assign-course',$_SERVER);
?>
<html>
<head>
    <title>Assign Course</title>
    <link rel="stylesheet" href="../includes/css/login-form.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../includes/jquery.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div style="background-color: #e0ebeb;">
    <?php include_once '../view/header.php' ?>
    <div id="snackbar_success" class="d-flex align-items-center justify-content-center"></div>
    <div id="snackbar_error" class="d-flex align-items-center justify-content-center"></div>

    <?php include_once '../view/assign-course-form.php' ?>
</div>


</body>
<?php include_once  '../view/css/snackbar.php'?>
<script>
    $(document).ready(function () {
        $('#course').change(function () {
            var courseId = $('#course').val();
            $.ajax({
                url: 'get_teachers.php',
                type: 'POST',
                data: {'course_id': courseId},
                success: function (response) {
                    $('#teacher').html(response);
                }
            });
        });
        $('#submit-btn').click(function () {
            if ($('#course').val() == '' || $('#teacher').val() == '') {
                var snackbar = document.getElementById('snackbar_error');
                snackbar.innerHTML = 'Please select course and teacher.';
                snackbar.className = 'show';
                setTimeout(function () {
                    snackbar.className = snackbar.className.replace('show', '');
                }, 3000);
                return false;
            }
        });
    });
</script>
</html>