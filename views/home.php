<?php
include "includes/head-home.php"
?>

<script type="text/javascript" src="<?=ROOT?>public/js/home.js"></script>

<div class="hero">
    <div class="container p-0">
        <div class="hero-title display-1 font-weight-bolder text-white">
            Fast and <br>Reliable Shipping
        </div>
        <?php if($_SESSION['logged_in'] == false): ?>
            <a href="<?=ROOT?>signup">
                <div class="hero-btn" style="width: 150px;"><h3 class="m-0 text-center">Join Us</h3></div>
            </a>
        <?php elseif($_SESSION['user_role'] == 2):?>
            <a href="">
                <div class="hero-btn" style="width: 225px;"><h3 class="m-0 text-center">Create Order</h3></div>
            </a>
        <?php endif;?>
    </div>
</div>

<?php
include "includes/footer.php"
?>