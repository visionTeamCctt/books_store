<?php 

$database['host'] = 'localhost';    
$database['username'] = 'root';
$database['userpass'] = '';
$database['name'] = 'books_store';

$link = mysqli_connect($database['host'], $database['username'], $database['userpass'], $database['name'], "3308")
 or die(mysqli_connect_error());

if(!$link){
    echo 'cannot login';
}
?>