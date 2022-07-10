<?php
include "includes/head-home.php"
?>

<script type="text/javascript" src="<?=ROOT?>public/js/home.js"></script>

<div class="hero">
    <div class="container hero-content p-0">
        <div class="container p-0 m-0">
            <div class="hero-title display-1 font-weight-bolder text-white">
                Fast and <br>Reliable Shipping
            </div>
            <?php if($_SESSION['logged_in'] == false): ?>
                <a href="<?=ROOT?>signup" style="width: 160px;">
                    <div class="hero-btn"><h3 class="m-0 text-center">Join Us</h3></div>
                </a>
            <?php elseif($_SESSION['user_role'] == 2):?>
                <a href="<?=ROOT?>create" style="width: 235px;">
                    <div class="hero-btn"><h3 class="m-0 text-center">Create Order</h3></div>
                </a>
            <?php endif;?>
        </div>
        
        <div class="believe">
            <h1 class="display-5 font-weight-bold">What we believe</h1>
            <p class="lead">
            We believe there's always a smarter and better way of doing things, which means we're constantly innovating and pushing the boundaries of how an agency can help its clients make better delivery.        
            </p>
        </div>

        <div class="tracking">
            <h1 class="display-5 font-weight-bold mb-3">Track your parcel</h1>
            <div class="d-flex justify-content-between flex-wrap container p-0 m-0">
                <div class="wrap-input100 validate-input m-0">
                    <input class="input100" type="text" name="tracking-number" placeholder="Tracking number">
                    <span class="focus-input100"></span>
                </div>
                <button class="btn btn-outline-light text-white">Search</button>
            </div>
        </div>
        
    </div>
</div>


<?php
include "includes/footer.php"
?>