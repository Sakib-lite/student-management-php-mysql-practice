<?php


$db = new Database();
$conn = $db->getConnection();

$courseObj = new Course();
$courses = $courseObj->getAllCourses($conn)

?>
<div class="container d-flex align-items-center justify-content-center ">

    <div class="mt-4 shadow-lg" style=" width: 700px;background-color: #ffffff">

        <div class="mt-4">


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Credit</th>
                    <th scope="col">Description</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($courses as $course) { ?>
                    <tr>
                        <th scope="row"><?php echo $course['course_id']; ?></th>
                        <td><?php echo $course['course_name']; ?></td>
                        <td><?php echo $course['course_credit']; ?></td>
                        <td><?php echo $course['course_description']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>