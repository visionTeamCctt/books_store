<?php

if(isset($_GET['order_id'])){
    delete();
}

function delete(){
    global $link;
    include 'db_connect.php';

    $order_id = mysqli_real_escape_string($link, $_REQUEST['order_id']);

    $sql = "DELETE FROM orders where id = $id";
    if( mysqli_query($link, $sql)){
        echo '<html>';
        echo '<head><link rel="stylesheet" href="style.css"></head>';
        echo '<body>';
        echo "<br><br><br><br><br><br>";
        echo "<center>";
        echo "<h1>تم الحذف بنجاح</h1>";
        echo "<br><br>";
        echo '<button class="button" id="go_shop_button" onclick=location.href="search_user_order.php";>الرجوع إلى الطلبات</button>';
        echo "</center>";
        echo '</body>';
        echo '</html>';
    }else{
        "Error".$sql."<br>".mysqli_error($link);
    }
    
    include 'db_close.php';
}

?>