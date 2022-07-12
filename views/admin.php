<div class="myorders jumbotron bg-white mx-4 my-3 p-5 rounded-0">
    <h3 class="ml-2">Shippers Management</h3>

  <div class="table-func mt-3" style="max-height: 750px; overflow: scroll; ">
    <table class="table table-striped w-100">
        <thead>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">Mail</th>
                <th scope="col">Date Created</th>
                <th scope="col">Verification</th>
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
            <?php if(empty($shippers)): ?>
              <div class="alert alert-warning">There is no shipper!</div>
            <?php else: ?>
              <?php foreach($shippers as $shipper): ?>
                <tr>
                    <td><?php echo $shipper['username']; ?></td>
                    <td><?php echo $shipper['email']; ?></td>
                    <td><?php echo $shipper['date_created']; ?></td>
                    <?php if($shipper['verified'] == 0): ?>
                      <td><form action="<?=ROOT?>admin/qualify/<?=$shipper['username']?>"><button type="submit" class="btn btn-block text-white btn-success">Qualify</button></form></td>
                    <?php endif; ?>
                    <?php if($shipper['verified'] == 1): ?>
                        <td><form action="<?=ROOT?>admin/disqualify/<?=$shipper['username']?>"><button type="submit" class="btn btn-block text-white btn-danger">Disqualify</button></form></td>
                    <?php endif; ?>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
