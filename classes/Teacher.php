<?php
//include_once '../includes/init.php';

class Teacher
{

    public function createTeacherProfile($conn, $formData)
    {
        try {
            $name = $formData['name'];
            $email = $formData['email'];
            $mobile = $formData['mobile'];

            $util = new Utility();
            $util->checkBlankField($formData);
            if ($util->blank) die("Failed");

            $checkEmail = "select * from teachers where teacher_email=:email";
            $stmt = $conn->prepare($checkEmail);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchAll();

            if (count($result) !== 0) die("Duplicate email found");
            $sql = 'insert into teachers (teacher_name,teacher_email,teacher_mobile) values (:name,:email,:mobile)';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":mobile", $mobile);


            $stmt->execute();


            echo '<script language="javascript">';
            echo 'alert("Teacher Profile created")';
            echo '</script>';

        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }

    }

    public function getAllTeachers($conn)
    {

        try {
            $sql = "select * from teachers";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {

            echo "Error" . $e->getMessage();
        }


    }

}




