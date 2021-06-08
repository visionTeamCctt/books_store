<?php

global $link;
include 'db_connect.php';

$item_id = '';
if (isset($_GET['item_id'])) {
    $item_id = $_GET['item_id'];
}
$sql = "DELETE FROM cart_items where item_id = $item_id";

if (mysqli_query($link, $sql)) {
    header("location: cart.php");
} else {
    echo "Error" . $sql . "<br>" . mysqli_error($link);
}

include 'db_close.php';
?>
