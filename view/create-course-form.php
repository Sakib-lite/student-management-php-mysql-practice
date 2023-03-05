<?php


if (isset($_POST['name'])) {

    $db = new Database();
    $conn = $db->getConnection();


    $courseObj = new Course();
    $courseObj->createCourse($conn, $_POST);


}
?>

<div class="container d-flex align-items-center justify-content-center ">
    <div class="mx-auto">
        <div class="form-group  rounded-lg mt-4 shadow-lg" style=" width: 500px;background-color: #ffffff">
            <form role="form" method="post" id="create-course-from"
                  class="p-4">


                <div class="mb-4">
                    <label class="form-label fw-bold">Course Name</label>

                    <input name='name' class="form-control" id="name" type="text">
                </div>


                <div class="mb-4">
                    <label class="form-label fw-bold">Course Credit</label>
                    <input name='credit' class="form-control" id="credit" type="number">
                </div>


                <div class="mb-3">
                    <label class="form-label fw-bold">Course Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                              placeholder="Enter course description"></textarea>
                </div>
                <button class="btn btn-lg  btn-block w-100 mt-4 text-uppercase" type="submit"
                        style="background-color: #4ade80">Create Course
                </button>
            </form>
        </div>
    </div>
</div>