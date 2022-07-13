<?php
include "includes/head.php";
?>

<link rel="stylesheet" href="<?= ROOT ?>public/css/signup.css"></link>

<div class="signup container-fluid">
    <div class="row justify-content-center">
        <h1 class="d-flex wtw display-2 font-weight-bolder p-5 text-right">Welcome to WEXPress!</h1>
        <div class="signup-form container">
            <form action="<?= ROOT ?>signup" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>    
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div> 
                <div class="form-group">
                    <label for="password-confirm">Password Confirm</label>
                    <input type="password" name="password_confirm" class="form-control">
                </div>  
                <div class="form-group">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="user" value="user" checked>
                        <label class="form-check-label" for="user">User account</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="role" id="shipper" value="shipper">
                        <label class="form-check-label" for="shipper">Shipper account</label>
                    </div>
                </div>
                <?php CSRF::outputToken(); ?>
                <?php if(!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php
                        foreach ($errors as $value) {
                            echo "$value" . " ";
                        }
                        ?>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn btn-block mt-4">Sign Up</button>
            </form>
            <hr>
            <p>Already have an account? </p>
            <a href="<?=ROOT?>login"><button class="btn btn-block mt-2">Login</button></a>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
?>