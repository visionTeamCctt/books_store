<html>

<head>
    <title>الطلبات</title>
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="header row">
        <ul class="nav-list row col-8">
            <li class="col-2">
                <a href="home.php">الرئيسية</a>
            </li>
            <li class="col-2">
                <a href="#">الطلبات</a>
            </li>
        </ul>
        <img src="images/logo.png" alt="logo" class="col-4" style="height: 50; width: 50;">
    </div>
    <br>
    <section class="body_sec">
        <br>
        

        <?php

        global $link;
        include 'db_connect.php';
        

        $customer_phone = mysqli_real_escape_string($link, $_REQUEST['customer_phone']);

        $sql = "SELECT * FROM store_books, orders WHERE orders.customer_phone = $customer_phone";
        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) > 0) {
            $total = 0;
           echo '<label class="title">تاريخ الطلبات</label>';
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
                echo        '<br>';
                echo        '<hr width="70%">';
                echo        '<br>';

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
            echo     '<br>';
            echo '</div>';
            echo '</div>';

        } else {
            echo '<html>';
            echo '<head><link rel="stylesheet" href="style.css"></head>';
            echo '<body>';
            echo "<br><br><br><br><br><br>";
            echo "<center>";
            echo "<h1>لا توجد طلبات خاصة بهذا الرقم</h1>";
            echo "<br><br>";
            echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
            echo "</center>";
            echo '</body>';
            echo '</html>';
        }

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