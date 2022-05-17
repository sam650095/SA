<?
    session_start();
    unset($_SESSION["account"]);
    unset($_SESSION["name"]);
    unset($_SESSION["name"]);
    
    header('location:login.php?method=message&message=已登出');
?>