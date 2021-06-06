<html>

<head>
    <title>الرئيسية</title>
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
                <a href="search_user_order.php">الطلبات</a>
            </li>
        </ul>
        <img src="images/logo.png" alt="logo" class="col-4" style="height: 50; width: 50;">
    </div>

    <div>
        <img src="images/home_bg.png" alt="home_background" id="background_image">
    </div>


    <section class="body_sec">
        <br>
        <div>
            <center>
                <h1>المكاتب</h1>
                <hr width="20%">
            </center>
            <br>
            <br>
        </div>
        <div>
        
        <?php
        global $link;

        include 'db_connect.php';

        $sql = "SELECT * from store";
        $result = mysqli_query($link, $sql);

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='row'><div class='col-10'>";
                echo "<h3>".$row['name']."</h3>";
                echo "</div>";
                echo "<div class='col-2'>";
                echo "<a href='store.php?id=".$row['id']."' class='see_all_link'>عرض الكل</a>";
                echo "</div>";
                echo "</div>";
                $sql2 = "SELECT * FROM store_books WHERE store_books.store_id = ".$row['id']." LIMIT 5";
                $result2 = mysqli_query($link, $sql2);

                if(mysqli_num_rows($result2) > 0){
                    echo "<div>";
                    echo "<ul class='books_menu'>";
                    while($row2 = mysqli_fetch_assoc($result2)){
                        
                    
                    echo "<li>";
                        echo "<img src='images/book".$row2['picture'].".jpg' alt='book1' height='200rem'>";
                    echo "</li>";
                
                    
                    }
                    echo "</ul>";
                    echo "</div>";
                }
                echo "<br><br><br>";
                echo "<hr width='60%'>";
                echo "<br><br><br>";
                
                }
            
                
        }

        include 'db_close.php';
        ?>
        </div>
    </section>
</body>

</html>