<?php

session_start();

$book_id = '';
        if(isset($_GET['book_id'])){
        $book_id = $_GET['book_id'];
    }
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login_form.php?book_id=".$book_id."");
    exit;
}
else{
    insert();
}



function insert(){
    global $link;
    include 'db_connect.php';

    $book_id = '';
        if(isset($_GET['book_id'])){
        $book_id = $_GET['book_id'];
    }
    
    $user_email = $_SESSION["email"];

    $sql = "INSERT INTO cart_items(item_id, book_id, user_email) 
    VALUES (NULL, $book_id, '$user_email')";

    if( mysqli_query($link, $sql)){
        echo '<html>';
        echo '<head><link rel="stylesheet" href="style.css"></head>';
        echo '<body>';
        echo "<br><br><br><br><br><br>";
        echo "<center>";
        echo "<h1>تمت إضافة الكتاب بنجاح</h1>";
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


