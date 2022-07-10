<link rel="stylesheet" href="<?= ROOT ?>public/css/shipper.css"></link>

<div class="orders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="mb-3">Available Orders (<?php echo count($a_orders)?>)</h3>
    <div class="list-group">
      <?php if(!empty($errors)): ?>
          <div class="alert alert-danger">
              <?php
              foreach ($errors as $value) {
                  echo "$value" . " ";
              }
              ?>
          </div>
      <?php else: ?>
        <?php if(empty($a_orders)): ?>
          <div class="alert alert-warning">There is no Available Order!</div>
        <?php else: ?>
          <?php foreach($a_orders as $order): ?>
            <div class="order p-3 d-flex flex-wrap justify-content-between">
                <a href="<?= ROOT ?>order/<?php echo $order['id'] ?>" class="order-info">
                    <p class="m-0 font-weight-bold"><span class="font-weight-normal">From: </span> <?php echo $order['sender_name']; ?></p>
                    <p class="m-0 font-weight-bold"><span class="font-weight-normal">To: </span><?php echo $order['recipient_name']; ?></p>
                    <p class="m-0">(Shipping Fee: <?php echo $order['weight']*10000; ?> VND)</p>
                </a>
                <button class="btn text-white" type="submit" action="">Pick Up</button>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
</div>

<div class="orders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="mb-3">Progressing Orders (<?php echo count($p_orders)?>)</h3>
    <div class="list-group">
      <?php if(!empty($errors)): ?>
          <div class="alert alert-danger">
              <?php
              foreach ($errors as $value) {
                  echo "$value" . " ";
              }
              ?>
          </div>
      <?php else: ?>
        <?php if(empty($p_orders)): ?>
          <div class="alert alert-warning">There is no Progressing Order!</div>
        <?php else: ?>
          <?php foreach($p_orders as $order): ?>
            <div class="order p-3 d-flex flex-wrap justify-content-between">
                <a href="<?= ROOT ?>order/<?php echo $order['id'] ?>" class="order-info">
                    <p class="m-0 font-weight-bold"><span class="font-weight-normal">From: </span> <?php echo $order['sender_name']; ?></p>
                    <p class="m-0 font-weight-bold"><span class="font-weight-normal">To: </span><?php echo $order['recipient_name']; ?></p>
                    <p class="m-0">(Shipping Fee: <?php echo $order['weight']*10000; ?> VND)</p>
                </a>
                <button class="btn text-white" type="submit" action="">Pick Up</button>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
</div>

<div class="orders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="mb-3">Completed Orders (<?php echo count($c_orders)?>)</h3>
    <div class="list-group">
      <?php if(!empty($errors)): ?>
          <div class="alert alert-danger">
              <?php
              foreach ($errors as $value) {
                  echo "$value" . " ";
              }
              ?>
          </div>
      <?php else: ?>
        <?php if(empty($c_orders)): ?>
          <div class="alert alert-warning">There is no Completed Order!</div>
        <?php else: ?>
          <?php foreach($c_orders as $order): ?>
            <div class="order p-3 d-flex flex-wrap justify-content-between">
                <a href="<?= ROOT ?>order/<?php echo $order['id'] ?>" class="order-info">
                    <p class="m-0 font-weight-bold"><span class="font-weight-normal">From: </span> <?php echo $order['sender_name']; ?></p>
                    <p class="m-0 font-weight-bold"><span class="font-weight-normal">To: </span><?php echo $order['recipient_name']; ?></p>
                    <p class="m-0">(Shipping Fee: <?php echo $order['weight']*10000; ?> VND)</p>
                </a>
                <button class="btn text-white" type="submit" action="">Pick Up</button>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
</div>
