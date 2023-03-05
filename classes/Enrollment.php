<?php

class Enrollment
{


    public function enroll($conn, $formData)
    {
        try {
            $studentId = $formData['student'];
            $courseId = $formData['course'];
            if (!$studentId || !$courseId) die("Please select student and course");
            $db = new Database();
            $conn = $db->getConnection();

            // Check if student is already enrolled in the course
            $enrollmentCheck = $conn->prepare("SELECT * FROM enrollments WHERE student_id = :student_id AND course_id = :course_id");
            $enrollmentCheck->bindParam(":student_id", $studentId);
            $enrollmentCheck->bindParam(":course_id", $courseId);
            $enrollmentCheck->execute();
            $enrollment = $enrollmentCheck->fetch();

            if ($enrollment) {
                echo "The student is already enrolled in this course.";
                exit();
            }

            // Insert the new enrollment
            $enrollmentInsert = $conn->prepare("INSERT INTO enrollments (student_id, course_id) VALUES (:student_id, :course_id)");
            $enrollmentInsert->bindParam(":student_id", $studentId);
            $enrollmentInsert->bindParam(":course_id", $courseId);
            $enrollmentInsert->execute();
            echo "<script>
            var snackbar = document.getElementById('snackbar_success');
            snackbar.innerHTML ='The student has been enrolled in the course.';
            snackbar.className = 'show';
            setTimeout(function(){ snackbar.className = snackbar.className.replace('show', ''); }, 3000);
        </script>";

        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
}


