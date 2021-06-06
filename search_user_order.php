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
<br><br><br><br>
  <center>
<form action="orders.php" method="post" name="search" class="form">
    <h2>أدخل رقم الهاتف</h2>
  <input type="text" id="customer_phone" name="customer_phone" value="" maxlength="14" class="input_field"><br><br>
  <div>
    <br><br>
  <input type="submit" name="search" value="بحث" class="button" id="search_button" onclick="return validate_phone_number();">
 
  </div>
</form>
</center>
</body>
</html>

