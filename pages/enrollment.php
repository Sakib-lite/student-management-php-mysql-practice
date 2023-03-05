<?php


require_once '../includes/init.php';
Auth::isLoggedIn();
$urlObj=new Url();

$urlObj->checkURL('/student-management/pages/enrollment',$_SERVER);


?>
<html>
<head>
    <title>Student Management System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../includes/jquery.js"></script>
    <link rel="stylesheet" href="../view/css/header.css">

</head>
<body style="background-color: rgba(250,250,250,0.79);">

<div class="w-100">
    <?php include_once '../view/header.php' ?>
    <div id="snackbar_success" class="d-flex align-items-center justify-content-center"></div>
    <div id="snackbar_error" class="d-flex align-items-center justify-content-center"></div>
    <?php include_once '../view/enrollment-form.php' ?>
</div>


</body>
<?php include_once  '../view/css/snackbar.php'?>
<script>
    $(document).ready(function() {
        $('#student').change(function() {
            var studentId = $('#student').val();
            $.ajax({
                url: 'get_courses.php',
                type: 'POST',
                data: {'student_id': studentId},
                success: function(response) {
                    $('#course').html(response);
                }
            });
        });

        $('#submit-btn').click(function () {
            if ($('#student').val() == '' || $('#course').val() == '') {
                var snackbar = document.getElementById('snackbar_error');
                snackbar.innerHTML = 'Please select student and course.';
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