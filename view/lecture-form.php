<?php
$db = new Database();
$conn = $db->getConnection();

$sql = 'SELECT courses.course_id,courses.course_name FROM courses JOIN assigned_courses on courses.course_id=assigned_courses.course_id GROUP BY course_name ORDER BY courses.course_id';
$courseObj = new Course();
$courses = $courseObj->getAllCourses($conn, $sql);

$lecutureObj = new Lecture();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lecutureObj->create_lecture($conn, $_POST);
}

?>


<div class="container d-flex align-items-center justify-content-center ">
    <div class="mx-auto">
        <div class="form-group  rounded-lg mt-4 shadow-lg" style=" width: 500px;background-color: #ffffff">
            <form role="form" method="post" id="create-lecture-form"
            "
            class="p-4">

            <div class="mb-4">
                <label class="form-label fw-bold">Lecture Title</label>

                <input name='title' class="form-control" id="title" type="text">
            </div>


            <div class="form-group mb-4">

                <label for="course" class="form-label fw-bold">Select a Course:</label>
                <select class="form-control" id="course" name="course">
                    <option disabled selected value="">Select course</option>
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
                    <option disabled selected value="">Select Teacher</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Lecture Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          placeholder="Enter lecture description"></textarea>
            </div>
            <button class="btn btn-lg  btn-block w-100 mt-4 text-uppercase" type="submit"
                    style="background-color: #4ade80">Create Lecture
            </button>
            </form></div>
    </div>
</div>