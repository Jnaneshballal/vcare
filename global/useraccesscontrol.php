<?php
include_once 'connection.php';
session_start();
$login = false;
if(isset($_SESSION['uid'])){
    $login = true;
    $global_uid = $_SESSION['uid'];
    $global_uname = $_SESSION['uname'];
}
?>