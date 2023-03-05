<?php


$db = new Database();
$conn = $db->getConnection();
$sql = 'SELECT ROW_NUMBER() OVER (ORDER BY courses.course_name) AS id, courses.course_name, teachers.teacher_name
FROM assigned_courses
JOIN courses ON assigned_courses.course_id = courses.course_id
JOIN teachers ON assigned_courses.teacher_id = teachers.teacher_id ORDER BY courses.course_name';
$courseObj = new Course();
$courses = $courseObj->getAllCourses($conn, $sql)

?>

<div class="container d-flex align-items-center justify-content-center ">

    <div class="mt-4 mb-4 shadow-lg" style=" width: 700px;background-color: #ffffff">


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Course Name</th>
                <th scope="col">Lecturer</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $course) { ?>
                <tr>
                    <th scope="row"><?php echo $course['id']; ?></th>
                    <td><?php echo $course['course_name']; ?></td>
                    <td><?php echo $course['teacher_name']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>