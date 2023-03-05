<?php


$db = new Database();
$conn = $db->getConnection();

$teacherObj = new Teacher();
$teachers = $teacherObj->getAllTeachers($conn);

?>


<div class="mt-4">


    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mobile</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($teachers as $teacher) { ?>
            <tr>
                <th scope="row"><?php echo $teacher['teacher_id']; ?></th>
                <td><?php echo $teacher['teacher_name']; ?></td>
                <td><?php echo $teacher['teacher_email']; ?></td>
                <td><?php echo $teacher['teacher_mobile']; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>