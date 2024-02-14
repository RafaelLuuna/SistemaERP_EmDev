


<?php

session_start();
require dirname(__FILE__,2).'/assets/validateUser.php';
require dirname(__FILE__,2).'/assets/sql/connection.php';




//Verifica se há cookies de pop-ups gerados------------
setcookie('haspopup', 'false', 0,'/');
$_SESSION['popupCount'] = 0;

foreach($_COOKIE as $k => $v){
    if(substr($k,0,5) == 'popup'){
        setcookie('haspopup', 'true', 0,'/');
        $_SESSION['popupCount'] += 1;
    } 
}
setcookie('count-popup', $_SESSION['popupCount'], 0,'/');
//-----------------------------------------------------


require 'master.php';

if(!isset($_SESSION['hash']) or validarUsuario('admin_users') == false){
    $_SESSION['hash'] = 0;
    echo '<script>insertInto("main-card","http://localhost/admin/views/login.php")</script>';
}else{
    echo '<script>insertInto("main-card","http://localhost/admin/views/dashboard.php")</script>';
}
echo '<script>showPopups();</script>';



?>



