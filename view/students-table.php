<?php


$db = new Database();
$conn = $db->getConnection();
$sql = "SELECT enrollments.enrollment_id, courses.course_name, students.student_name,students.student_email
FROM enrollments
JOIN courses ON enrollments.course_id = courses.course_id
JOIN students ON enrollments.student_id = students.student_id ";
$studentObj = new User();
$students = $studentObj->getAllStudents($conn, $sql);

?>
<div class="container d-flex align-items-center justify-content-center " >
<div class="">
    <div class="mt-4 shadow-lg" style=" width: 700px;background-color: #ffffff">


        <table class="table w-10">
            <thead>
            <tr>
                <th scope="col">Enrollment Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Course</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student) { ?>
                <tr>
                    <th scope="row"><?php echo $student['enrollment_id']; ?></th>
                    <td><?php echo $student['student_name']; ?></td>
                    <td><?php echo $student['student_email']; ?></td>
                    <td><?php echo $student['course_name']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div></div>