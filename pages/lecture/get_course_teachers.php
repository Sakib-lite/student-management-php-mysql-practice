<?php
include_once './../../includes/init.php';

Auth::isLoggedIn();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = new Database();
    $conn = $db->getConnection();
    $sql = "SELECT * FROM teachers WHERE teacher_id  IN (SELECT teacher_id FROM assigned_courses WHERE course_id = :course_id)";
    $courseId = $_POST['course_id'];

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":course_id", $courseId);
    $stmt->execute();
    $query = $stmt->fetchAll();

    echo '<option disabled selected value="">Select teacher</option>';
    foreach ($query as $teacher) {
        echo "<option value='" . $teacher['teacher_id'] . "'>" . $teacher['teacher_name'] . "</option>";
    }
}
