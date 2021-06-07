<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <SCRIPT LANGUAGE="JavaScript" src="app.js"></SCRIPT>
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
        <li class="col-6">
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
            <img src="images/logo.png" alt="logo" class="col-4" style="height: 63px; width: 63px; padding: 10px">
        </ul>
        
    </div> 
  

    <?php
  $book_id = '';
  if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    echo '<form action="auth_function.php?book_id=' . $book_id . '" method="post" name="signup" id="form1">';
  } else {
    echo '<form action="auth_function.php" method="post" name="signup" id="form1">';
  }
  ?>
  <h2>تسجيل حساب</h2>
  <br>
    الاسم: <input type="text" id="username" name="username" value="" class="input_field"><br><br>
    رقم الهاتف: <input type="text" id="phone" name="phone" value="" class="input_field"><br><br>
    البريد الإلكتروني: <input type="text" id="userEmail" name="email" value="" class="input_field" onblur="validate_email(this.value)"><br><br>
    العنوان: <input type="text" id="address" name="address" value="" class="input_field"><br><br>
    الرقم السري: <input type="text" id="address" name="password" value="" class="input_field"><br><br>
    تأكيد الرقم السري: <input type="text" id="address" name="confirm_password" value="" class="input_field"><br><br>
    <div>
      <br>


      <div class="row">
        <div class="col-6">
          <input type="submit" name="signup" value="تسجيل" class="button" id="order_button"
           onclick="return validate_fields(); return validate_email(this.value);">
        </div>
        <div class="col-6">
          <input type="reset" class="button" id="order_button" value="مسح البيانات">
        </div>
      </div>



    </div>

  </form>

</body>

</html>