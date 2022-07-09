<?php
include "includes/head.php"
?>

<link rel="stylesheet" href="<?=ROOT?>public/css/create.css">

<div class="container-sm my-5 px-5">
  <form>
    <div class="form-group">
      <p class="lead">Pickup Address</p>
      <label for="fromName">Name</label>
      <input type="text" class="form-control" id="fromName">
      <label for="fromAddress">Address</label>
      <input class="form-control" id="fromAddress">
      <label for="fromTel">Mobile Number</label>
      <input type="text" class="form-control" id="fromTel">
    </div>
    <hr>
    <div class="form-group">
      <p class="lead">Delivery Address</p>
      <label for="toName">Name</label>
      <input type="text" class="form-control" id="toName">
      <label for="toAddress">Address</label>
      <input class="form-control" id="toAddress">
      <label for="toTel">Mobile Number</label>
      <input type="text" class="form-control" id="toTel">
    </div>
    <hr>
    <div class="form-group">
      <p class="lead">Parcel Info</p>
      <label for="parcelName">Name</label>
      <input type="text" class="form-control" id="parcelName">
      <label for="parcelWeight">Weight</label>
      <input type="number" class="form-control" id="parcelWeight" min="1" max="20">
    </div>
    <hr>

    <button type="submit" class="btn btn-lg btn-white btn-block mt-4 mb-5">Create Order</button>
  </form>
</div>

<?php
include "includes/footer.php"
?>