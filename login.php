<?php
require_once 'init.php';
// Xử lý logic ở đây

$title = "Login";
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'admin' && $password == '1') {
        header('Location: ./admin/index.php');
        exit();
    }

    $user = findUserByUsername($username);
    if (!$user) {
        $error = 'User does not exist!';
    } else if (!password_verify($password, $user['password'])) {
        $error = 'Incorrect password!';
    } else {
        if ($user['validation']) {
            $error = 'Please check your email for account activation!!!!';
        } else {
            //Assign the user to session
            $_SESSION['userId'] = $user['id'];
            $_SESSION['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
            $_SESSION['cartId'] = getCartIdByUserId($user['id']);
            header('Location: index.php');
            exit();
        }
    }
}
?>
<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <h1 class="display-4 text-center font-weight-normal mb-4"><?php echo $title ?></h1>
        
        <?php if (isset($error)) : ?>
            <!--Check error message -->
            <!--Show error message -->
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
            <!--Error analysis -->
            <?php if ($error == 'Incorrect password!') : ?>
                <?php include 'formLogin.php'; ?>
            <?php else : ?>
                <?php include 'formLogin.php'; ?>
            <?php endif; ?>
        <?php else : include 'formLogin.php' ?>

        <?php endif; ?>

<?php include 'footer.php'; ?>