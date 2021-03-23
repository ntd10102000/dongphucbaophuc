<?php
require_once 'init.php';
$title = 'Sign up success'
?>

<?php include 'header.php'; ?>
<div id="content" class="mb-4">
    <div class="container pt-3">
        <h1 class="display-4 text-center font-weight-normal mb-4"><?php echo $title ?></h1>
        <!--Check error message -->
        <!--Show error message -->
        <div class="mt-5 alert alert-info" role="alert">
            <?php echo 'Please check your account activation email!!'; ?>
        </div>