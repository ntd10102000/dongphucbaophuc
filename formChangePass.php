<form class = "m-auto col-lg-6 col-12" action="changePass.php" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="text"  name="currentPass" required class="form-control">
                <label  class="">Current password</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="password"  name="newPassword" required class="form-control">
                <label  class="">New password</label>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="md-form mb-0">
                <input type="password"  name="newPassConfirm" required class="form-control">
                <label  class="">New password confirm</label>
            </div>
        </div>
    </div>
    
    <div class="d-flex justify-content-end m-4">
        <a class="text-primary" href="login.php">Go to login</a>
    </div>
    <button type="submit" class="btn w-100 m-auto bg-primary-color btn-primary-color">Change</button>
</form>