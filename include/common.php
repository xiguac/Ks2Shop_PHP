<?php
@include('./include/Ks2ShopMySQL.php');
@include("./ks2shop_config.php");

ob_clean();
session_start();
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set('PRC');
@header('Content-type: text/html; charset=utf-8');


define('HTTPS', false);
function IsHTTPS()
{
    if (defined('HTTPS') && HTTPS) return true;
    if (!isset($_SERVER)) return FALSE;
    if (!isset($_SERVER['HTTPS'])) return FALSE;
    if ($_SERVER['HTTPS'] === 1) {
        return TRUE;
    } elseif ($_SERVER['HTTPS'] === 'on') {
        return TRUE;
    } elseif ($_SERVER['SERVER_PORT'] == 443) {
        return TRUE;
    }
    return FALSE;
}
if (empty($_POST)) $_POST = $_GET;
$ks2shop['host'] = (IsHTTPS() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'];
$time = date("Ymd");
?>