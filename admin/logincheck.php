<?php

// ini_set('display_errors', '1');

require_once(dirname(__FILE__) . '/../_init.php');
if (($_POST['imgcode'] != $_SESSION['IMGCODE'] || time() >= $_SESSION['IMGCODE_EXPIRED']))
{
    // header("Location: ./ ");
    // exit;
}

$obj = new Site;

if (!$ret = $obj->login())
{
    header("Location: ./ ");
    exit;
}
else
{
    if ($obj->setSession($ret))
        header("Location: ./static_about.php");
    else
        header("Location: ./logout.php");
    exit;
}