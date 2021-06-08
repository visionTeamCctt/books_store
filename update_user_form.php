<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <SCRIPT LANGUAGE="JavaScript" src="app.js"></SCRIPT>
  <div class="header row">

    <ul class="nav-list row col-11">
      <li class="col-2">
        <a href="home.php">الرئيسية</a>
      </li>
    </ul>
    <img src="images/logo.png" alt="logo" class="col-1" style="height: 63px; width: 63px; padding: 12px">

  </div>


  <form action="auth_function.php" method="post" name="update" id="form1">
    <h2>تعديل بيانات الحساب</h2>
    <br>
    <?php

    session_start();

    echo 'الاسم: <input type="text" id="username" name="username" value="'.$_SESSION['username'].'" class="input_field"><br><br>';
    echo 'رقم الهاتف: <input type="text" id="phone" name="phone" value="'.$_SESSION['phone'].'" class="input_field"><br><br>';
    echo 'البريد الإلكتروني: <input type="text" id="email" name="email" value="'.$_SESSION['email'].'" class="input_field" onblur="validate_email(this.value)"><br><br>';
    echo 'العنوان: <input type="text" id="address" name="address" value="'.$_SESSION['address'].'" class="input_field"><br><br>';
    echo 'الرقم السري: <input type="password" id="password" name="password" value="'.$_SESSION['password'].'" class="input_field"><br><br>';
    echo 'تأكيد الرقم السري: <input type="password" id="confirm_password" name="confirm_password" value="'.$_SESSION['password'].'" class="input_field"><br><br>';

    ?>
    <div>
      <br>


      <div class="row">
        <div class="col-6">
          <input type="submit" name="update" value="تعديل" class="button" id="order_button" onclick="return validate_update();">
        </div>
        <div class="col-6">
          <input type="reset" class="button" id="order_button" value="مسح البيانات">
        </div>
      </div>



    </div>

  </form>

</body>

</html>