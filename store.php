<html lang="ar">

<head>
    <title>المتجر</title>
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
               <a href="search_user_order.php">الطلبات</a>
           </li>
           
       </ul>
       <ul class="nav-list row col-3">
       <li class="col-8">
           <?php
           session_start();

           if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
           {
               echo '<a href="login_form.php">تسجيل دخول</a>';
           }
           else{
              echo '<a href="logout.php">تسجيل خروج</a>';
           }
               ?>
           </li>
           <img src="images/logo.png" alt="logo" class="col-3" style="height: 63px; width: 63px; padding: 10px">
       </ul>
       
   </div>
    <section class="body_sec">
        <br>
        
        <?php
        global $link;

        include 'db_connect.php';

        $id = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }

        $sql = "SELECT * FROM store_books WHERE store_id = $id";
        $result = mysqli_query($link, $sql);


        if (mysqli_num_rows($result) > 0) {
            // echo  "<center><h2>";
            // echo  "مكتبة ".mysqli_fetch_assoc($result)['name'];
            // echo "</h2></center><hr style='width: 20%;'><br>";
            // echo '<h1>hello</h1>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="row">';
                echo '<div class="col-6">';
                echo '<div class="row">';
                echo     '<div class="col-4">';

                echo "<img src='images/book".$row['picture'].".jpg' alt='book' height='200px'>";
                echo     '</div>';
                echo     '<div class="col-8">';
                echo        ' <h2>';
                echo             $row['book_name'];
                echo         '</h2>';
                echo         '<p>';
                echo             $row['author'];
                echo         '</p>';
                echo         '<h3>';
                echo             $row['price'].' د.ل';
                echo         '</h3>';
                echo         '<div>';
                echo             '<button type="button" class="button" id="add_to_order" onclick=location.href="cart_insert.php?book_id='.$row["book_id"].'";> ';
                echo                 'طلب الآن';
                echo             '</button>';
                echo         '</div>';
                echo     '</div>';
                echo    '</div>';
                echo    '</div>';
            }
        }
        ?>
        
    </section>
</body>

</html>