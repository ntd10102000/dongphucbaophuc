<form class="m-auto col-lg-6 col-12" action="register.php" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input required type="text" name="full_name" class="form-control">
                <label for="full_name" class="">Full name</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input required type="text" name="username" class="form-control">
                <label for="username" class="">Username</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input  required type="password" name="password" class="form-control">
                <label for="password" class="">Password</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input required  type="password" name="passwordConfirm" class="form-control">
                <label for="password" class="">Password confirm</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input  required  type="email" name="email" class="form-control">
                <label for="email" class="">Email</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input  required  type="number" id="phone_number" name="phone_number" class="form-control">
                <label for="phone_number" class="">Phone</label>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-end m-4">
        <a class="text-primary" href="login.php">Go to login</a>
    </div>
    <button type="submit" class="btn w-100 m-auto bg-primary-color btn-primary-color">Register</button>
</form>