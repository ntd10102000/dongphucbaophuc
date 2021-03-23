<form class = "m-auto col-lg-6 col-12" action="forgetPass.php" method="POST">

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="text" name="username" class="form-control" required>
                <label for="username" class="">Username</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="email" name="email" class="form-control" required>
                <label for="email" class="">Email</label>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end m-4">
        <a class="text-primary" href="login.php">Go to login</a>
    </div>
    <button type="submit" class="btn w-100 m-auto bg-primary-color btn-primary-color">Submit</button>
</form>