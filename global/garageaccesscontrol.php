<?php
include_once 'connection.php';
session_start();
$gologin = false;
if (isset($_SESSION['goid'])) {
    $gologin = true;
    $global_goid = $_SESSION['goid'];
    $global_goname = $_SESSION['goname'];
}
?>