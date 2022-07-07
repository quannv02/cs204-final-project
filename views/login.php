<?php
include "includes/head.php";
?>

<link rel="stylesheet" href="<?= ROOT ?>/public/css/login.css"></link>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <h1 class="d-flex wb display-2 font-weight-bolder my-5 p-5">Welcome Back!</h1>
            <div class="login-form container">
                <form action="<?= ROOT ?>user/login" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control">
                    </div>    

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div> 

                    <?php CSRF::outputToken(); ?>
                    <button type="submit" class="btn btn-block mt-4">Login</button>
                </form>
            </div>
        </div>
        <//?php var_dump($_SESSION) ?>
    </div>

<?php
include "includes/footer.php";
?>