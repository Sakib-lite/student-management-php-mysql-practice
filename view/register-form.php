<div class="container d-flex align-items-center justify-content-center ">
    <div class="mx-auto">
<div class="form-group  rounded-lg mt-4 shadow-lg" style=" max-width: 600px;background-color: #ffffff">


        <form role="form" method="post" action="../includes/registerAction.php" id="register-form"  class=" p-5 row">

            <div class="mb-4  col-md-6 ">
                <label class="form-label fw-bold">Full Name</label>

                <input name='fullname' class="form-control" id="fullname" type="text">
            </div>

            <div class="mb-4 col-md-6 ">
                <label class="form-label fw-bold">Email address</label>
                <input name='email' class="form-control" id="email" type="email" placeholder="@gmail.com">
            </div>

            <div class="mb-4 col-md-6 ">
                <label class="form-label fw-bold">Mobile Number</label>
                <input name='mobile' class="form-control" id="mobile" type="number">
            </div>

            <div class="mb-4 col-md-6 ">
                <label class="form-label fw-bold">Roll </label>
                <input name='roll' class="form-control" id="roll" type="number">
            </div>

            <div class="mb-4 col-md-6 ">
                <label class="form-label fw-bold">Password</label>
                <input class="form-control" name='password' id="password" type="password"
                       placeholder="*****************">
            </div>

            <div class="mb-3 col-md-6 ">
                <label class="form-label fw-bold">Confirm Password</label>
                <input class="form-control" name='confirmPassword' id="confirmPassword" type="password"
                       placeholder="*****************">
            </div>
            <button class="btn btn-lg  btn-block w-100 mt-4 text-uppercase" type="submit" style="background-color: #4ade80">Register</button>
        </form></div>
    </div>
</div>