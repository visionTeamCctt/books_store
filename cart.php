<html>

<head>
    <title>السلة</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="header row">

        <ul class="nav-list row col-9">
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
        <ul class="nav-list row col-3">
            <li class="col-7">
                <?php
                session_start();

                if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                    echo '<a href="login_form.php">تسجيل دخول</a>';
                } else {
                    echo '<a href="logout.php">تسجيل خروج</a>';
                }
                ?>
            </li>
            <img src="images/logo.png" alt="logo" class="col-5" style="height: 63px; width: 63px; padding: 12px">
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

        $sql = "SELECT * FROM store_books, cart_items WHERE cart_items.user_id = $user_id AND store_books.book_id = cart_items.book_id";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            $total = 0;
            echo '<label class="title">السلة</label>';
            echo '<br><br><br>';

            echo '<div class="row">';
            echo            '<div class="col-8">';

            while ($row = mysqli_fetch_assoc($result)) {
                echo            '<div class="row" id="cart_items">';
                echo            '<div class="col-3">';
                echo                '<img src="images/book' . $row['picture'] . '.jpg" alt="book1" height="160rem">';
                echo            '</div>';
                echo            '<div class="col-4">';
                echo                '<h2>';
                echo                    $row['book_name'];
                echo                '</h2>';
                echo                '<p>';
                echo                    $row['author'];;
                echo                '</p>';

                echo            '</div>';
                echo            '<div class="col-3">';
                echo                '<h2>';
                echo                    $row['price'] . " د.ل";
                echo                '</h2>';
                echo            '</div>';

                echo             '</div>';
                echo            '<div class="col-2">';
                echo             '<a';
                echo            '</div>';

                echo             '</div>';
                echo             '<br>';
                echo             '<hr width="70%">';
                echo             '<br>';

                $total += $row['price'];
            }

            echo "</div>";
            echo '<div class="col-3">';
            echo '<br>';
            echo '<br>';
            echo '<div id="cart_pay_info">';
            echo     '<center>';
            echo         '<div class="row">';
            echo             '<div class="col-6">';
            echo                 '<h3>';
            echo                     'الإجمالي';
            echo                ' </h3>';
            echo             '</div>';
            echo             '<div class="col-6">';
            echo                 '<h3>';
            echo                        $total . " د.ل";;
            echo                 '</h3>';
            echo             '</div>';
            echo         '</div>';
            echo     '</center>';
            echo     '<br>';
            echo '<center>';
            echo         '<button class="button" id="continue_order" onclick=location.href="place_order.php?total=' . $total . '";>';
            echo             'إجراء الطلب';
            echo        ' </button>';
            echo     '<br>';
            echo '</div>';
            echo '</div>';
        } else {
            echo '<html>';
            echo '<head><link rel="stylesheet" href="style.css"></head>';
            echo '<body>';
            echo "<br><br><br><br><br><br>";
            echo "<center>";
            echo "<h1>لا توجد منتجات في السلة</h1>";
            echo "<br><br>";
            echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
            echo "</center>";
            echo '</body>';
            echo '</html>';
        }

        include 'db_close.php';

        ?>
    </section>


</body>

</html>