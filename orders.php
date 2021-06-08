<html>

<head>
    <title>الطلبات</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="header row">

        <ul class="nav-list row col-7">
            <li class="col-2">
                <a href="home.php">الرئيسية</a>
            </li>
            <li class="col-2">
                <a href="cart.php">السلة</a>
            </li>
            <li class="col-2">
                <a href="orders.php">الطلبات</a>
            </li>

        </ul>
        <ul class="nav-list row col-5">

            <?php
            session_start();

            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                echo '<div class="col-5">';
                echo '</div>';
                echo '<li class="col-5">';
                echo '<a href="login_form.php">تسجيل دخول</a>';
                echo '</li>';
                echo '<img src="images/logo.png" alt="logo" class="col-2" style="height: 63px; width: 63px; padding: 12px">';
            } else {
                echo '<li class="col-5">';
                echo '<a href="update_user_form.php">تعديل الحساب</a>';
                echo '</li>';
                echo '<li class="col-5">';
                echo '<a href="logout.php">تسجيل خروج</a>';
                echo '</li>';
                echo '<img src="images/logo.png" alt="logo" class="col-2" style="height: 63px; width: 63px; padding: 12px">';
            }
            ?>


        </ul>

    </div>
    <br>
    <section class="body_sec">
        <br>


        <?php

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            header("location: login_form.php");
            exit;
        }

        global $link;
        include 'db_connect.php';


        $user_id = $_SESSION["user_id"];

        // $sql = "SELECT * FROM store_books, orders, order_items WHERE order_items.order_id = orders.order_id AND
        //  order_items.book_id = store_books.book_id AND orders.user_id = " . $user_id . "";
        // $result = mysqli_query($link, $sql);


        // get orders
        $orders_sql = "SELECT * FROM orders WHERE orders.user_id = " . $user_id . " ORDER BY order_id DESC";
        $orders = mysqli_query($link, $orders_sql);

        if (mysqli_num_rows($orders) > 0) {

            echo '<label class="title">تاريخ الطلبات</label>';
            echo '<hr width = "240px" align = "right"><br><br><br>';







            // for($i = mysqli_num_rows($orders); $i > 0; $i--) {
            //     $order_items_sql = "SELECT * FROM store_books, order_items, orders WHERE order_items.order_id = $i
            //  AND order_items.book_id = store_books.book_id AND orders.user_id = $user_id";
            //     $order_items = mysqli_query($link, $order_items_sql);

            while ($row2 = mysqli_fetch_assoc($orders)) {

                $order_items_sql = "SELECT * FROM store_books, order_items WHERE order_items.order_id = " . $row2['order_id'] . "
             AND order_items.book_id = store_books.book_id";
                $order_items = mysqli_query($link, $order_items_sql);

                $total = 0;

                echo '<div id = "order_box">';

                if (mysqli_num_rows($order_items) > 0) {

                    while ($row = mysqli_fetch_assoc($order_items)) {
                        echo            '<div class="row" id="cart_items">';
                        echo            '<div class="col-3">';
                        echo                '<img src="images/book' . $row['picture'] . '.jpg" alt="book1" height="200rem">';
                        echo            '</div>';
                        echo            '<div class="col-4">';
                        echo                '<h2>';
                        echo                    $row['book_name'];
                        echo                '</h2>';
                        echo                '<p>';
                        echo                    $row['author'];;
                        echo                '</p>';
                        echo                '<br>';

                        echo            '</div>';
                        echo            '<div class="col-3">';
                        echo                '<h2>';
                        echo                    $row['price'] . " د.ل";
                        echo                '</h2>';
                        echo            '</div>';

                        echo             '</div>';
                        echo        '<br>';
                        echo        '<hr width="70%">';
                        echo        '<br>';

                        $total += $row['price'];
                    }
                } else {
                    echo "Error" . $sql . "<br>" . mysqli_error($link);
                }
                
                echo '<center>';
                echo '<div class="row">';
                echo                '<h5 class="col-4">';
                echo                    'تاريخ الطلب: ' . $row2['order_date'] . '';
                echo                '</h5>';

                echo                '<h5 class="col-4">';
                echo                    'حالة الطلب: ' . $row2['order_status'] . '';
                echo                '</h5>';

                echo                '<h5 class="col-4">';
                echo                    'الإجمالي: ' . $total . ' د.ل';
                echo                '</h5>';
                echo '</div>';
                echo '</center>';
                echo '</div>';
                echo '<br><br><br>';
            }
        } else {
            echo '<html>';
            echo '<head><link rel="stylesheet" href="style.css"></head>';
            echo '<body>';
            echo "<br><br><br><br><br><br>";
            echo "<center>";
            echo "<h1>لا توجد طلبات</h1>";
            echo "<br><br>";
            echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
            echo "</center>";
            echo '</body>';
            echo '</html>';
        }




        // if (mysqli_num_rows($result) > 0) {
        //     $total = 0;
        //     echo '<label class="title">تاريخ الطلبات</label>';
        //     echo '<hr width = "240px" align = "right"><br><br><br>';

        //     echo '<div class="row">';
        //     echo            '<div class="col-12">';

        //     while ($row = mysqli_fetch_assoc($result)) {
        //         echo            '<div class="row" id="cart_items">';
        //         echo            '<div class="col-3">';
        //         echo                '<img src="images/book' . $row['picture'] . '.jpg" alt="book1" height="200rem">';
        //         echo            '</div>';
        //         echo            '<div class="col-4">';
        //         echo                '<h2>';
        //         echo                    $row['book_name'];
        //         echo                '</h2>';
        //         echo                '<p>';
        //         echo                    $row['author'];;
        //         echo                '</p>';
        //         echo                '<br>';
        //         echo                '<p>';
        //         echo                    'تاريخ الطلب: ' . $row['order_date'] . '';
        //         echo                '</p>';

        //         echo            '</div>';
        //         echo            '<div class="col-3">';
        //         echo                '<h2>';
        //         echo                    $row['price'] . " د.ل";
        //         echo                '</h2>';
        //         echo            '</div>';

        //         echo             '</div>';

        //         echo            '</div>';

        //         echo             '</div>';
        //         echo        '<br>';
        //         echo        '<hr width="70%">';
        //         echo        '<br>';

        //         $total += $row['price'];
        //     }

        //     echo "</div>";
        //     // echo '<div class="col-3">';
        //     // echo '<br>';
        //     // echo '<br>';
        //     // echo '<div id="cart_pay_info">';
        //     // echo     '<center>';
        //     // echo         '<div class="row">';
        //     // echo             '<div class="col-6">';
        //     // echo                 '<h3>';
        //     // echo                     'الإجمالي';
        //     // echo                ' </h3>';
        //     // echo             '</div>';
        //     // echo             '<div class="col-6">';
        //     // echo                 '<h3>';
        //     // echo                        $total . " د.ل";;
        //     // echo                 '</h3>';
        //     // echo             '</div>';
        //     // echo         '</div>';
        //     // echo     '</center>';
        //     // echo     '<br>';
        //     // echo     '<br>';
        //     echo '</div>';
        //     echo '</div>';
        // } else {
        //     echo '<html>';
        //     echo '<head><link rel="stylesheet" href="style.css"></head>';
        //     echo '<body>';
        //     echo "<br><br><br><br><br><br>";
        //     echo "<center>";
        //     echo "<h1>لا توجد طلبات</h1>";
        //     echo "<br><br>";
        //     echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
        //     echo "</center>";
        //     echo '</body>';
        //     echo '</html>';
        // }

        include 'db_close.php';
        ?>
    </section>

    <!-- <center>
           echo         <button class="button" id="continue_order">
           echo             الرجوع للتسوق
           echo         </button>
           echo     </center> -->
</body>



</html>