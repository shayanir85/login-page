<?php
session_start();
$_COOKIE['phone'] = '';
setcookie('phone',' ',time() + (86400*30),'/');
echo '<meta http-equiv="refresh" content="0 url=index.php">';
?>