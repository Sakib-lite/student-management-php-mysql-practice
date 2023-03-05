<?php
$db = new Database();
$conn = $db->getConnection();


$courseObj = new Course();
$courses = $courseObj->getAllCourses($conn);

$studentObj = new User();
$students = $studentObj->getAllStudents($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $enrollment = new Enrollment();
    $enrollment->enroll($conn, $_POST);
}
?>


<div class=" d-flex align-items-center justify-content-center p-3">
    <div class="mx-auto">
        <div class="shadow-lg form-group rounded-lg" style=" width: 500px;background-color: #ffffff">
            <form role="form" method="post" id="login-form"
                  class="  p-5 rounded-lg rounded-lg-lg ">


                <div class="mb-4">

                    <label for="course" class="form-label fw-bold">Select Student:</label>
                    <select class="form-control form-select" id="student" name="student">
                        <option value="" class="form-select" selected disabled>Select Student</option>
                        <?php foreach ($students as $student) { ?>


                            <option class="form-select" value="<?php echo $student["student_id"];
                            ?>">
                                <?php echo $student["student_name"];
                                ?>
                            </option>

                        <?php } ?>
                    </select>
                </div>


                <div class="mb-4 ">
                    <label for="course" class="form-label fw-bold">Select Course:</label>
                    <select class="form-control form-select" id="course" name="course">
                        <option value="" disable>Select Course</option>
                    </select>

                </div>


                <button class="btn btn-lg  btn-block w-100 mt-4 text-uppercase" type="submit"
                        style="background-color: #4ade80">Enroll
                </button>
            </form>
        </div>
    </div>
</div>