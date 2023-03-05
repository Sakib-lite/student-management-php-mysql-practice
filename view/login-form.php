<div class="container d-flex align-items-center justify-content-center">
    <div class="mx-auto">


        <div class="form-group  rounded-lg mt-4 shadow-lg" style=" width: 500px;background-color: #ffffff">
            <form role="form" method="post" id="login-form" action="../includes/loginAction.php" class="  p-5 ">

                <div class="mb-4">
                    <label class="form-label fw-bold">Email address</label>
                    <!--                <input type="email" id="email" class="" >-->
                    <input name='email' class="form-control" id="email" type="email" placeholder="@gmail.com"
                           value="sakib10@gmail.com">
                </div>
                <div class="mb-2">
                    <label class="form-label fw-bold">Password</label>
                    <!--                <input type="password" id="password" class= >-->
                    <input class="form-control" name='password' id="password" type="password"
                           placeholder="*****************" value="12345">
                    <label id="password-error" class="error" for="password"></label>
                </div>
                <button class="btn btn-lg  btn-block w-100 mt-4 text-uppercase" type="submit"
                        style="background-color: #4ade80">Login
                </button>
            </form>
        </div>
    </div>
</div>