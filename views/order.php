<?php
include "includes/head.php"
?>

<link rel="stylesheet" href="<?= ROOT ?>/public/css/create.css"></link>

<div class="container-sm mt-3">
  <?php if(isset($successNoti)): ?>
      <div class="alert alert-success"><?=$successNoti?></div>
  <?php endif;?>
  <h2>Order Information</h2>
  <?php if(!empty($order)): ?>
  <p>Tracking number: </h4><?php echo $order['id']; ?></p>
  <p>Time created: <?php echo date("M-d-Y", strtotime($order['date_created'])); ?></p>
  <p>Shipping fee: <?php echo $order['weight']*10000; ?> VND</p>
  <hr>
  <h4>Sender:</h4>
  <p>Name: <?php echo $order['sender_name']; ?></p>
  <p>Address: <?php echo $order['sender_address']; ?></p>
  <p>Mobile number: <?php echo $order['sender_tel']; ?></p>
  <hr>
  <h4>Recipient:</h4>
  <p>Name: <?php echo $order['recipient_name']; ?></p>
  <p>Address: <?php echo $order['recipient_address']; ?></p>
  <p>Mobile number: <?php echo $order['recipient_tel']; ?></p>
  <?php endif; ?>
    <hr class="mb-0">
    <a href="<?= ROOT ?>my-page" class="btn mt-2 mb-3">Back</a>
</div>

<?php
include "includes/footer.php"
?>
