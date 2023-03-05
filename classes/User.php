<?php
//include_once '../includes/init.php';

class User
{

    private $blank;


    public function register($conn, $form)
    {
        try {

            $name = $form['fullname'];
            $email = $form["email"];
            $password = $form['password'];
            $roll = $form['roll'];
            $mobile = $form['mobile'];
            $confirmPassword = $form['confirmPassword'];



            $util=new Utility();
            $util->checkBlankField($form);
            if ($util->blank) die("Failed");


            if ($password !== $confirmPassword) die("password can't be matched");

            $encryptedPassword = hash('md5', $password);

            $checkEmail = "select * from students where student_email=:email";
            $stmt = $conn->prepare($checkEmail);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetchAll();

            if (count($result) !== 0) die("Duplicate email found");

            $sql = 'insert into students (student_name,student_email,student_roll,student_mobile,student_password) values (:name,:email,:roll,:mobile,:encryptedPassword)';
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":roll", $roll);
            $stmt->bindParam(":mobile", $mobile);
            $stmt->bindParam(":encryptedPassword", $encryptedPassword);

            $stmt->execute();

            header('Location:http://localhost/student-management/pages/login.php');
            exit;
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }

    public function login($conn, $formData)
    {

        try {
            $email = $formData['email'];
            $password = $formData['password'];
            $decryptedPassword = hash('md5', $password);
            echo $email . "</br>";
            echo $password . "</br>";
            $sql = "select * from students where student_email=:email AND student_password=:decryptedPassword";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':decryptedPassword', $decryptedPassword);
            $stmt->execute();
            $result = $stmt->fetch();

            if (count($result) > 0) {

                $_SESSION["id"] = $result["student_id"];
                $_SESSION["name"] = $result["student_name"];
                $_SESSION["email"] = $result["student_email"];
                $_SESSION['is_Logged_in'] = true;
                header('Location:http://localhost/student-management/pages/home.php');

            } else die("Wrong email or password");
        } catch (PDOException $e) {
            echo "Error" . $e->getMessage();
        }
    }
    public function logout()
    {

        foreach ($_SESSION as $key => $val) {
            if ($key !== 'message') unset($_SESSION[$key]);
        }
        $_SESSION["message"] = "You have been successfully logged out!";
        header('Location:http://localhost/student-management/pages/login.php');

    }


    public function getAllStudents($conn,$sql= "select * from students")
    {

        try {
//            $sql = "select * from students";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {

            echo "Error" . $e->getMessage();
        }


    }
}




