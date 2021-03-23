<form class="m-auto col-lg-6 col-12" action="login.php" method="POST">

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="text" name="username" required class="form-control">
                <label  class="">Username</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="password"  name="password" required class="form-control">
                <label  class="">Password</label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between m-4">
        <a class="text-dark" href="forgetPass.php">Forget password ??</a>
        <a class="text-dark" href="register.php">Register</a>
    </div>
    <button type="submit" class="btn w-100 m-auto bg-primary-color btn-primary-color">Login</button>   
</form>
