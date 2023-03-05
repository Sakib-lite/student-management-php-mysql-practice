<?php $lectureObj = new Lecture();
$lectures = $lectureObj->getAllLectures();


foreach ($lectures as $lecture) {
    echo $lecture['lecture_id'].": ". $lecture['lecture_description']."</br>";
}

?>