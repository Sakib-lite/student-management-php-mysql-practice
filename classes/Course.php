<?php


class Course
{


    public function createCourse($conn, $formData)
    {

        try {
            $name = $formData['name'];
            $credit = $formData['credit'];
            $description = $formData['description'];

            $util = new Utility();
            $util->checkBlankField($formData);
            if ($util->blank) die("Failed");

            $checkCourse = "select * from courses where course_name=:name";
            $stmt = $conn->prepare($checkCourse);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
            $result = $stmt->fetchAll();

            if (count($result) !== 0) die("Duplicate course found");


            $sql = 'insert into courses (course_name,course_credit,course_description) values (:name,:credit,:description)';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":credit", $credit);
            $stmt->bindParam(":description", $description);


            $stmt->execute();


            echo "<script>
            var snackbar = document.getElementById('snackbar_success');
            snackbar.innerHTML ='Course created';
            snackbar.className = 'show';
            setTimeout(function(){ snackbar.className = snackbar.className.replace('show', ''); }, 3000);
        </script>";

        } catch (PDOException $e) {

            echo 'Error' . $e->getMessage();
        }
    }

    public function getAllCourses($conn, $sql = "select * from courses")
    {

        try {

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {

            echo "Error" . $e->getMessage();
        }


    }


    public function assign_course($conn, $formData)
    {
        try {

            $courseId = $formData['course'];
            $teacherId = $formData['teacher'];

            if (!$courseId || !$teacherId) {

                echo 'Please select course and teacher.';
                exit();
            }
            $db = new Database();
            $conn = $db->getConnection();

            // Check if student is already enrolled in the course
            $enrollmentCheck = $conn->prepare("SELECT * FROM assigned_courses WHERE course_id = :course_id AND teacher_id = :teacher_id");
            $enrollmentCheck->bindParam(":course_id", $courseId);
            $enrollmentCheck->bindParam(":teacher_id", $teacherId);
            $enrollmentCheck->execute();
            $enrollment = $enrollmentCheck->fetch();

            if ($enrollment) {
                echo 'The course is already assigned to this teacher.';
                exit();
            }

            // Insert the new enrollment
            $enrollmentInsert = $conn->prepare("INSERT INTO assigned_courses (course_id, teacher_id) VALUES (:course_id, :teacher_id)");
            $enrollmentInsert->bindParam(":course_id", $courseId);
            $enrollmentInsert->bindParam(":teacher_id", $teacherId);
            $enrollmentInsert->execute();

            echo "<script>
            var snackbar = document.getElementById('snackbar_success');
            snackbar.innerHTML ='The course has been assigned to the teacher';
            snackbar.className = 'show';
            setTimeout(function(){ snackbar.className = snackbar.className.replace('show', ''); }, 3000);
        </script>";
        } catch (PDOException $e) {

            echo 'Error' . $e->getMessage();

        }
    }
}