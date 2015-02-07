<?php

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
// header("Content-Type:text/html; charset=utf-8");
ob_start();
ini_set('display_errors', '1');
session_start();
// error_reporting(E_ALL ^ E_NOTICE);
// debug mode
define('Debug', false);

// manage
if (is_file("admin.admin"))
{
    $root = '../';
}
// front-end
else
{
    $root = '';
}

// case name
define('CASENAME', 'ozzie');

// 定義資料表之通用名
define('SITE', CASENAME . '_site_conf');
define('CONSUL', CASENAME . '_consultation');
define('CATPRODUCT', CASENAME . '_catalog_product');
define('CATPRESS', CASENAME . '_catalog_press');
define('PRODUCT', CASENAME . '_product');
define('PRESS', CASENAME . '_press');
define('PHOTO', CASENAME . '_photo');
define('BANNER', CASENAME . '_banner');

// deploy folder
$root_f = '/dev';

$inPage = pathinfo($_SERVER["PHP_SELF"]);

// 本頁檔名
define('this_Page', $inPage["basename"]);

// 根目錄
define('_ROOT', $_SERVER['DOCUMENT_ROOT'] . $root_f);

// 圖片存放位置
define('UPLOAD_Image', $root . 'img/files/');
define('TEMP_Image', $root . 'img/user_images/temp/');
define('FILES_down', $root . 'download/');
define('INC_CLASS', _ROOT . 'inc/class/');
define('INC_ADMIN', _ROOT . 'admin/inc/');
define('IMAGES', $root . 'img/');
define('WEB', 'http://ozzie-art.com' . $root_f);

// configuration folder
define("_CONF", _ROOT . "/conf/");

// database information
define("_DBXML", _CONF . "db.xml");

//圖檔名前綴
$image_Prefix = array("s_", "m_", "l_", "ss_", "");

//每頁筆數
$Allp = 9;

//引入常用功能
require_once(_ROOT . "inc/function.php");

// define DB
$_db = new DB;

// check login
if (!is_object(unserialize($_SESSION['loginObj'])))
{
    Site::checkLogin();
}
else
{
    unserialize($_SESSION['loginObj'])->checkLogin();
}

$_POST = TrimArray($_POST);
TrimArray($_GET);