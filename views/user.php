<link rel="stylesheet" href="<?= ROOT ?>public/css/user.css"></link>

<div class="createorder jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h1 class="display-4 font-weight-normal">Hi there!</h1>
    <p class="lead ml-1">Are you ready to ship some parcels?</p>
    <hr class="my-2 w-50 ml-1">
    <p class="lead mt-4 mb-0 ml-1">
        <a class="btn btn-lg" href="<?= ROOT ?>create" role="button">Create Order</a>
    </p>
</div>

<div class="myorders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="ml-2">My Orders</h3>
    <form class="form-inline mt-3" action="<?= ROOT ?>search" method="post">
        <label class="sr-only" for="inlineFormInputName2">Name</label>
        <input type="text" name="search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="Tracking Number">
        <?php CSRF::outputToken(); ?>
        <button type="submit" class="btn mb-2 text-white">Search</button>
     </form>

  <div class="table-func mt-3">
    <table class="table table-striped w-100">
        <thead>
            <tr>
                <th scope="col">Tracking Number</th>
                <th scope="col">Recipient</th>
                <th scope="col">Parcel Name</th>
                <th scope="col">Cost</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
          <?php if(!empty($errors)): ?>
              <div class="alert alert-danger">
                  <?php
                  foreach ($errors as $value) {
                      echo "$value" . " ";
                  }
                  ?>
              </div>
          <?php else: ?>
            <?php if(empty($orders)): ?>
              <div class="alert alert-warning">You have no order!</div>
            <?php else: ?>
              <?php foreach($orders as $order): ?>
                <tr>
                    <td scope="row"><a href="<?= ROOT ?>order/<?php echo $order['id'] ?>"><?= $order['id']; ?></a></td>
                    <td><?php echo $order['recipient_name']; ?></td>
                    <td><?php echo $order['parcel_name']; ?></td>
                    <td><?php echo $order['weight']*10000; ?></td>
                    <?php if($order['status'] == 1): ?>
                      <td>Order Created</td>
                    <?php endif; ?>
                    <?php if($order['status'] == 2): ?>
                      <td class="text-warning">Order Shipped</td>
                    <?php endif; ?>
                    <?php if($order['status'] == 3): ?>
                      <td class="text-success">Order Arrived</td>
                    <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
