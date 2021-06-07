<?php

if (isset($_POST['signup'])) {
    signup();
}

if (isset($_POST['login'])) {
    login();
}

function signup()
{
    global $link;
    include 'db_connect.php';

    $phone = mysqli_real_escape_string($link, $_REQUEST['phone']);
    $username = mysqli_real_escape_string($link, $_REQUEST['username']);
    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $address = mysqli_real_escape_string($link, $_REQUEST['address']);
    $password = mysqli_real_escape_string($link, $_REQUEST['password']);


    $sql = "INSERT INTO users(user_id, username, phone, email, address, password) 
    VALUES (NULL, '$username', '$phone', '$email', '$address', '$password')";
    if (mysqli_query($link, $sql)) {
        session_start();


        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $username;

        if (isset($_GET['book_id'])) {
            header("location: cart_insert.php?book_id=" . $_GET['book_id'] . "");
        } else {
            header("location: home.php");
        }

        // echo '<html>';
        // echo '<head><link rel="stylesheet" href="style.css"></head>';
        // echo '<body>';
        // echo "<br><br><br><br><br><br>";
        // echo "<center>";
        // echo "<h1>تم تسجيل الحساب بنجاح</h1>";
        // echo "<br><br>";
        // echo '<button class="button" id="go_shop_button" onclick=location.href="home.php";>الرجوع للتسوق</button>';
        // echo "</center>";
        // echo '</body>';
        // echo '</html>';
    } else {
        echo "Error" . $sql . "<br>" . mysqli_error($link);
    }

    include 'db_close.php';
}

function login()
{
    global $link;
    include 'db_connect.php';

    $email = mysqli_real_escape_string($link, $_REQUEST['email']);
    $password = mysqli_real_escape_string($link, $_REQUEST['password']);


    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($link, $sql);

    if (mysqli_num_rows($result) > 0) {
        session_start();


        $_SESSION["loggedin"] = true;
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $username;


        if (isset($_GET['book_id'])) {
            header("location: cart_insert.php?book_id=" . $_GET['book_id'] . "");
        } else {
            header("location: home.php");
        }
    } else {
        header("location: login_form.php");
    }

    include 'db_close.php';
}
