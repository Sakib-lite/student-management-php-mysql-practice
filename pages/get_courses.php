<?php
include_once './../includes/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $conn = $db->getConnection();
    $sql = "SELECT * FROM courses WHERE course_id NOT IN (SELECT course_id FROM enrollments WHERE student_id = :student_id)";
    $studentId = $_POST['student_id'];
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":student_id", $studentId);
    $stmt->execute();
    $query = $stmt->fetchAll();

    echo '<option disabled selected  value=""  class="form-select">Select course</option>';
    foreach ($query as $course) {
        echo "<option   value='" . $course['course_id'] . "'>" . $course['course_name'] . "</option>";
    }
}
