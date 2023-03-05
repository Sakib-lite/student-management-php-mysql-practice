<?php


class Lecture
{

    public function create_lecture($conn, $formData)
    {
        try {

            $courseId = $formData['course'];
            $teacherId = $formData['teacher'];
            $title = $formData['title'];
            $description = $formData['description'];

            if (!$courseId || !$teacherId) {

                echo 'Please select course and teacher.';
                exit();
            }
            $db = new Database();
            $conn = $db->getConnection();


            // Insert the new enrollment
            $enrollmentInsert = $conn->prepare("INSERT INTO lectures (lecture_title,lecture_description,course_id, teacher_id) VALUES (:title,:description,:course_id, :teacher_id)");
            $enrollmentInsert->bindParam(":title", $title);
            $enrollmentInsert->bindParam(":description", $description);
            $enrollmentInsert->bindParam(":course_id", $courseId);
            $enrollmentInsert->bindParam(":teacher_id", $teacherId);
            $enrollmentInsert->execute();

            echo "<script>
            var snackbar = document.getElementById('snackbar_success');
            snackbar.innerHTML ='Lecture Created';
            snackbar.className = 'show';
            setTimeout(function(){ snackbar.className = snackbar.className.replace('show', ''); }, 3000);
        </script>";
        } catch (PDOException $e) {

            echo 'Error' . $e->getMessage();

        }
    }


    public function getAllLectures()
    {

        try {

            $sql = "SELECT
    lectures.lecture_id,
    courses.course_name,
    teachers.teacher_name,
    lectures.lecture_title,
    lectures.lecture_description
FROM
    lectures
JOIN courses ON lectures.course_id = courses.course_id
JOIN teachers ON lectures.teacher_id = teachers.teacher_id
ORDER BY
    courses.course_name";

            $db = new Database();
            $conn = $db->getConnection();

            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();


        } catch (PDOException $e) {
            echo 'Error' . $e->getMessage();


        }

    }


}




