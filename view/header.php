<section class="container-fluid py-3   sticky-top" style="background-color: #f3f3f3;">
    <div class="row">

        <div class="col-md-8 col-xs-6">
            <nav class="navbar navbar-expand-md  navbar-dark px-3" aria-label="First navbar example">
                <div class="">
                    <a class="navbar-brand " href="\student-management\pages\home" style="color: #1e1c1c">Student</a>
                </div>

                <button class="navbar-toggler collapsed text-secondary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon text-secondary " style="filter: invert(1);"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarsExample01" style="">
                    <ul class="navbar-nav ms-auto ml-4">

                        <?php
                        if (isset($_SESSION['is_Logged_in'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page"
                                   href="\student-management\pages\home">Home</a>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown"
                                   aria-expanded="false">Course</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="\student-management\pages\course\create-course">Create
                                            Course</a></li>
                                    <li><a class="dropdown-item"
                                           href="\student-management\pages\course\all-assigned-courses">Assigned
                                            Courses</a></li>
                                    <li><a class="dropdown-item" href="\student-management\pages\course\all-courses">All
                                            Courses</a></li>
                                </ul>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                   aria-expanded="false">Lecture</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item "
                                           href="\student-management\pages\lecture\create-lecture">Create Lecture</a>
                                    </li>


<!--                                    <li><a class="dropdown-item"-->
<!--                                           href="\student-management\pages\lecture\all-lectures.php">All-->
<!--                                            Lectures</a></li>-->

                                </ul>
                            </li>


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                   aria-expanded="false">Teacher</a>
                                <ul class="dropdown-menu">


                                    <li><a class="dropdown-item "
                                           href="/student-management/pages/teacher/create-teacher-profile">Create
                                            Teacher
                                            Profile</a></li>


                                    <!--                                <li><a class="dropdown-item" href="#">All Teachers</a></li>-->

                                </ul>
                            </li>
                            <?php
                        }
                        ?>


                        <?php
                        if (isset($_SESSION['is_Logged_in'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page"
                                   href="\student-management\pages\student\all-students">Students</a>
                            </li>
                            <?php
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['is_Logged_in']) == false) {
                            ?>


                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page"
                                   href="\student-management\pages\login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page"
                                   href="\student-management\pages\register">Signup</a>
                            </li>   <?php
                        }
                        ?>
                        <!---->
                        <?php
                        if (isset($_SESSION['is_Logged_in'])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link active " aria-current="page"
                                   href="\student-management\pages\enrollment">Enroll</a>
                            </li>
                            <?php
                        }
                        ?>
                        <!--                        -->

                        <?php
                        if (isset($_SESSION['is_Logged_in'])) {
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link active" href='../includes/logoutAction.php'>Logout</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                    <div class="ml-4"></div>

                </div>

            </nav>
        </div>
    </div>
</section>

