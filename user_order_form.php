<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <SCRIPT LANGUAGE="JavaScript" src="app.js"></SCRIPT>
  <div class="header row">
       
        <ul class="nav-list row col-8">
            <li class="col-2">
                <a href="home.php">الرئيسية</a>
            </li>
            <li class="col-2">
                <a href="search_user_order.php">الطلبات</a>
            </li>
        </ul>
        
    </div>
  <?php
  $book_id = '';
  if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];
  }

  echo '<form action="order_insert.php?book_id=' . $book_id . '" method="post" name="order" id="form1">';
  ?>

<h2>نموذج بيانات الطلب</h2>
<br>


  الاسم: <input type="text" id="username" name="username" value="" class="input_field"><br><br>
  رقم الهاتف: <input type="text" id="phone" name="phone" value="" class="input_field"><br><br>
  البريد الإلكتروني: <input type="text" id="userEmail" name="userEmail" value="" class="input_field" onblur="validate_email(this.value)"><br><br>
  العنوان: <input type="text" id="address" name="address" value="" class="input_field"><br><br>
  <div>
    <br>


    <div class="row">
      <div class="col-6">
        <input type="submit" name="order" value="طلب" class="button" id="order_button" onclick="return validate_fields(); return validate_email(this.value);">
      </div>
      <div class="col-6">
        <input type="reset" class="button" id="order_button" value="مسح البيانات">
      </div>
    </div>



  </div>

  </form>

</body>

</html>