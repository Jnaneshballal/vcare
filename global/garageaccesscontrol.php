<?php
include_once 'connection.php';
session_start();
$glogin = false;
if (isset($_SESSION['gid'])) {
    $glogin = true;
    $global_gid = $_SESSION['gid'];
    $global_gname = $_SESSION['gname'];
}
?>