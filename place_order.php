<?php

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login_form.php");
    exit;
}

insert();


function insert()
{
    global $link;
    include 'db_connect.php';

    $user_id = $_SESSION['user_id'];
    $date = date('Y-m-d');
    $total = $_GET['total'];


    // inserting new order
    $sql = "INSERT INTO orders(order_id, user_id, total, order_date) 
    VALUES (NULL, $user_id, $total, '$date')";
    $result = mysqli_query($link, $sql);





    if ($result) {
        // getting the last order id 
        $order_sql = "SELECT * FROM orders ORDER BY order_id DESC LIMIT 1";
        $orders = mysqli_query($link, $order_sql);
        $order_id = 1;
        if (mysqli_num_rows($orders) > 0) {
            while ($row = mysqli_fetch_assoc($orders)) {
                $order_id = $row['order_id'];
            }
        } else {
            echo "Error" . $sql . "<br>" . mysqli_error($link);
        }

        // getting cart items
        $cart_sql = "SELECT * FROM cart_items WHERE cart_items.user_id = $user_id";
        $cart_items = mysqli_query($link, $cart_sql);

        // insert order item from cart item
        if (mysqli_num_rows($cart_items) > 0) {
            while ($row = mysqli_fetch_assoc($cart_items)) {
                $book_id = $row['book_id'];
                $insert_order_item_sql = "INSERT INTO order_items(order_item_id, book_id, order_id) 
                VALUES (NULL, $book_id, $order_id)";
                $order_item_inserted = mysqli_query($link, $insert_order_item_sql);

                // check if order items inserted
                if (!$order_item_inserted) {
                    echo "Error" . $sql . "<br>" . mysqli_error($link);
                }
            }

            // trucate cart items
            $truncate_cart_sql = "TRUNCATE TABLE cart_items";
            if (mysqli_query($link, $truncate_cart_sql)) {
                echo '<html>';
                echo '<head><link rel="stylesheet" href="style.css"></head>';
                echo '<body>';
                echo "<br><br><br><br><br><br>";
                echo "<center>";
                echo "<h1>تم الطلب بنجاح</h1>";
                echo "<br><br>";
                echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
                echo "</center>";
                echo '</body>';
                echo '</html>';
            } else {
                echo "Error" . $sql . "<br>" . mysqli_error($link);
            }
        } else {
            echo "Error" . $sql . "<br>" . mysqli_error($link);
        }
    } else {
        echo "Error" . $sql . "<br>" . mysqli_error($link);
    }

    include 'db_close.php';
}


// echo '<html>';
        // echo '<head><link rel="stylesheet" href="style.css"></head>';
        // echo '<body>';
        // echo "<br><br><br><br><br><br>";
        // echo "<center>";
        // echo "<h1>تم طلب الكتاب بنجاح</h1>";
        // echo "<br><br>";
        // echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
        // echo "</center>";
        // echo '</body>';
        // echo '</html>';