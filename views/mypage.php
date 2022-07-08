<?php
include "includes/head.php";

if($_SESSION['user_role'] == 2) {
    include "user.php";
} else if($_SESSION['user_role'] == 1) {
    include "shipper.php";
}
?>

<?php
include "includes/footer.php";
?>