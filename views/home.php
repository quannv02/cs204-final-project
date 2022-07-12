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
            <?php elseif($_SESSION['user_role'] == 1):?>
                <a href="<?=ROOT?>my-page" style="width: 260px;">
                    <div class="hero-btn"><h3 class="m-0 text-center">Pick Up Order</h3></div>
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
            <form action="<?= ROOT ?>track" method="post" class="d-flex justify-content-between flex-wrap container p-0 m-0">
                <div class="wrap-input100 validate-input m-0">
                    <input class="input100" type="text" name="tracking-number" placeholder="Tracking number">
                    <span class="focus-input100"></span>
                    <?php CSRF::outputToken(); ?>
                </div>
                <button type="submit" class="btn btn-outline-light text-white">Track</button>
            </form>
            <div class="container-sm mt-3">
              <?php if(!empty($errors)): ?>
                  <p> No order found! </p>
              <?php else: ?>
                <?php if(!empty($order)): ?>
                  <br>
                  <h4>Order Status</h4>
                  <p>Tracking number: </h4><?php echo $order['id']; ?></p>
                  <p>Shipping fee: <?php echo $order['weight']*10000; ?> VND</p>
                <?php if($order['status'] == 1): ?>
                  <p>Order Created</p>
                <?php endif; ?>
                <?php if($order['status'] == 2): ?>
                  <p class="text-warning">Order Shipped</td>
                <?php endif; ?>
                <?php if($order['status'] == 3): ?>
                  <p class="text-success">Order Arrived</td>
                <?php endif; ?>
              <?php endif; ?>
              <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php"
?>
