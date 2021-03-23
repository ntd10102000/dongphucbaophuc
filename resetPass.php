<?php
require_once 'init.php';

$title = 'Reset password';

//Check link 
if (isset($_GET['id']) && isset($_GET['code'])) {
    $id = $_GET['id'];
    $user = findUserById($id);
    if (!$user || $user['activation'] != null || !password_verify($user['email'], $_GET['code']))
        $error = 'Link is not valid';
    else {
        $_SESSION['id'] = $user['id'];
    }
}


//Check data on form reset password
if (isset($_POST['newPass']) && isset($_POST['newPassConfirm'])) {
    $userId = $_SESSION['id'];
    $newPass = $_POST['newPass'];
    $newPassConfirm = $_POST['newPassConfirm'];

    //Check new pass and new pass confirm
    if ($newPass != $newPassConfirm) {
        $error = 'Password confirm don\'t match!';
    } else {
        changePass($userId, password_hash($newPass, PASSWORD_DEFAULT));
        exit(header('Location: index.php'));
    }
}
?>

<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <h1 class="display-4 text-center font-weight-normal mb-4"><?php echo $title ?></h1>
        <?php if (isset($error)) : ?>
            <!--Show error message -->
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
            <?php if ($error == 'Link is not valid') : ?>
                <a href="./login.php" class="btn btn-primary">Go to login page</a>
            <?php else : ?>
                <!--if user type newpass and newPassConfirm don't match,show form reset pass -->
                <?php include 'formResetPass.php'; ?>
            <?php endif; ?>
        <?php else : ?>
            <?php include 'formResetPass.php'; ?>
        <?php endif ?>
<?php include 'footer.php'; ?>