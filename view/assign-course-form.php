<?php
$db = new Database();
$conn = $db->getConnection();


$courseObj = new Course();
$courses = $courseObj->getAllCourses($conn);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $courseObj->assign_course($conn, $_POST);
}
?>


<div class="container d-flex align-items-center justify-content-center " style="height: 100vh;">
    <div class="mx-auto">
        <div class="form-group">
            <form role="form" method="post" id="login-form"
                  class=" bg-light p-5 rounded-lg rounded-lg-lg">


                <div class="mb-4">

                    <label for="course" class="form-label fw-bold">Select a Course:</label>
                    <select class="form-control" id="course" name="course">
                        <option value="">Select course</option>
                        <?php foreach ($courses as $course) { ?>


                            <option value="<?php echo $course["course_id"];
                            ?>">
                                <?php echo $course["course_name"];
                                ?>
                            </option>

                        <?php } ?>
                    </select>
                </div>




                    <div class="mb-4">
                        <label for="course" class="form-label fw-bold">Select Teacher:</label>
                        <select class="form-control" id="teacher" name="teacher">
                            <option value="">Select Teacher</option>
                        </select>
                    </div>




                <button class="btn btn-lg btn-primary btn-block" type="submit" id="submit-btn">Assign</button>
            </form>
        </div>
    </div>
</div>