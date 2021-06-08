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

  <br>
  <?php
  $book_id = '';
  if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
    echo '<form action="auth_function.php?book_id=' . $book_id . '" method="post" name="login" id="form1">';
  } else {
    echo '<form action="auth_function.php" method="post" name="login" id="form1">';
  }
  ?>
  <h2>تسجيل دخول</h2>
  <br>
  البريد الإلكتروني: <input type="text" id="email" name="email" value="" class="input_field" onblur="validate_email(this.value)"><br><br>
  الرقم السري: <input type="password" id="password" name="password" value="" class="input_field"><br><br>
  <div>
    <br>
    <div class="row">
      <div class="col-6">
        <input type="submit" name="login" value="تسجيل" class="button" id="order_button" onclick="return validate_login();">
      </div>
      <div class="col-6">
        <input type="reset" class="button" id="order_button" value="مسح البيانات">
      </div>
    </div>
    <br>

    <center>
      <?php
      $book_id = '';
      if (isset($_GET['book_id'])) {
        echo '<a href="signup_form.php?book_id=' . $_GET['book_id'] . '" class="sign_link">تسجيل حساب جديد</a>';
      } else {
        echo '<a href="signup_form.php" class="sign_link">تسجيل حساب جديد</a>';
      }
      ?>
    </center>


  </div>


  </form>



</body>

</html>