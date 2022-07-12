<link rel="stylesheet" href="<?= ROOT ?>public/css/shipper.css"></link>

<div class="orders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="mb-3">Available Orders (<?php echo count($a_orders)?>)</h3>
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
        <div class="table-func mt-3" style="max-height: 750px; overflow: scroll;">
          <table class="table table-striped w-100">
              <thead>
                  <tr>
                      <th scope="col">Order Number</th>
                      <th scope="col">Sender Name</th>
                      <th scope="col">Recipient Name</th>
                      <th scope="col">Shipping Fee</th>
                      <th scope="col"></th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach($a_orders as $order): ?>
                  <tr>
                      <td scope="row"><a href="<?= ROOT ?>order/<?php echo $order['id'] ?>"><?= $order['id']; ?></a></td>
                      <td></span> <?php echo $order['sender_name']; ?></td>
                      <td></span> <?php echo $order['recipient_name']; ?></td>
                      <td><?php echo $order['weight']*10000; ?> VND</td>
                      <td>
                        <form action='<?= ROOT ?>pick-up/<?= $order['id']?>'>
                          <button class="btn text-white" type="submit" action="">Pick Up</button>
                        </form>
                      </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      <?php endif; ?>
    <?php endif; ?>
</div>

<div class="orders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="mb-3">Progressing Orders (<?php echo count($p_orders)?>)</h3>
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
        <div class="table-func mt-3" style="max-height: 750px; overflow: scroll; ">
          <table class="table table-striped w-100">
              <thead>
                  <tr>
                      <th scope="col">Order Number</th>
                      <th scope="col">Sender Name</th>
                      <th scope="col">Recipient Name</th>
                      <th scope="col">Shipping Fee</th>
                      <th scope="col"></th>
                  </tr>
              </thead>
              <tbody>
                <?php foreach($p_orders as $order): ?>
                  <tr>
                      <td scope="row"><a href="<?= ROOT ?>order/<?php echo $order['id'] ?>"><?= $order['id']; ?></a></td>
                      <td></span> <?php echo $order['sender_name']; ?></td>
                      <td></span> <?php echo $order['recipient_name']; ?></td>
                      <td><?php echo $order['weight']*10000; ?> VND</td>
                      <td class="row">
                        <form action='<?= ROOT ?>complete-order/<?= $order['id']?>'>
                          <button class="btn text-white" type="submit" action="">Done</button>
                        </form>
                      </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      <?php endif; ?>
    <?php endif; ?>
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
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>
</div>
