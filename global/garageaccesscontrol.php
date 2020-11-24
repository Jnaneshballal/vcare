<?php
include_once 'connection.php';
session_start();
$login = false;
if (isset($_SESSION['gid'])) {
    $login = true;
    $global_gid = $_SESSION['gid'];
    $global_gname = $_SESSION['gname'];
}
