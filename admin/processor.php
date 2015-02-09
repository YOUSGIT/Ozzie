<?php

require_once(dirname(__FILE__) . '/../_init.php');
header('Content-Type: text/html; charset=utf-8');
$back = './';

$FUNC = trim($_REQUEST['func']);
$DOIT = trim($_REQUEST['doit']);
$GOBACK = trim($_REQUEST['goback']);

if ($FUNC)
{
    switch ($FUNC)
    {
        case "Product":

            $func = new Product;
            break;

        case "Events":

            $func = new Events;
            break;

        case "News":

            $func = new News;
            break;

        case "Consul":

            $func = new Consultation;
            break;

        case "Banner":

            $func = new Banner;
            break;

        case "Photo":

            $func = new Photo;
            break;

        case "CatProject":

            $func = new CatalogProject;
            break;

        case "Projects":

            $func = new Projects;
            break;

        case "Site":
            $func = new Site;
            break;
        default:
            break;
    }
}

switch ($DOIT)
{
    case "renew":

        $func->renew();
        if ($func->is_sort())
            $func->resort();

        break;

    case "del":

        $ret = $func->killu();
        $ret = array('ret' => (string) $ret);
        if ($func->is_sort())
            $func->resort();

        break;

    case "pw":
        $func->modPW();
        break;

    case "move":

        $func->move_sequ();
        break;

    case "sort":
        $ret = $func->sortable();
        $ret = array('ret' => (string) $ret);
        break;

    case "sale":
        $ret = $func->sale();
        $ret = array('ret' => (string) $ret);

        break;
}

if ($_REQUEST['ajax_type'] == 'json')
{
    exit(json_encode($ret));
}

if ($GOBACK != "0")
    $func->goback();