<div class="container d-flex align-items-center justify-content-center " >
    <div class="mx-auto">
        <div class="form-group  rounded-lg mt-4 shadow-lg" style=" width: 500px;background-color: #ffffff" >


        <form role="form" method="post" action="../../includes/teacherProfileAction.php" id="teacher-profile-form"  class="p-4" >

            <div class="mb-4">
                <label  class="form-label fw-bold"> Name</label>

                <input name='name' class="form-control" id="name" type="name" >
            </div>
            <div class="mb-4">
                <label  class="form-label fw-bold">Email address</label>
                <input name='email' class="form-control" id="email" type="email" placeholder="@gmail.com">
            </div>

            <div class="mb-4">
                <label  class="form-label fw-bold">Mobile  Number</label>
                <input name='mobile' class="form-control" id="mobile" type="number">
            </div>


            <button class="btn btn-lg  btn-block w-100 mt-4 text-uppercase" type="submit" style="background-color: #4ade80">Create Teacher Profile</button>

        </form></div>
    </div>
</div>