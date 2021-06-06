<?php

if(isset($_POST['order'])){
   insert();
}

function insert(){
    global $link;
    include 'db_connect.php';

    $book_id = '';
        if(isset($_GET['book_id'])){
        $book_id = $_GET['book_id'];
    }


    $customer_phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
    $username = mysqli_real_escape_string($link, $_REQUEST['username']);
    $customer_email = mysqli_real_escape_string($link, $_REQUEST['userEmail']);
    $customer_address = mysqli_real_escape_string($link, $_REQUEST['address']);
    $date = date('Y-m-d');
   
    

    $sql = "INSERT INTO orders(id, book_id, customer_name, customer_phone, customer_email, customer_address, order_date) 
    VALUES (NULL, $book_id, '$username', '$customer_phone', '$customer_email', '$customer_address', '$date')";
    if( mysqli_query($link, $sql)){
        echo '<html>';
        echo '<head><link rel="stylesheet" href="style.css"></head>';
        echo '<body>';
        echo "<br><br><br><br><br><br>";
        echo "<center>";
        echo "<h1>تم طلب الكتاب بنجاح</h1>";
        echo "<br><br>";
        echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
        echo "</center>";
        echo '</body>';
        echo '</html>';
    }else{
        echo "Error".$sql."<br>".mysqli_error($link);
    }
    
    include 'db_close.php';
}

?>


