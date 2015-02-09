<?php

require_once(dirname(__FILE__) . '/_init.php');
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
    case "list_index":
        if ($data = $func->get_index_wall($_POST['from']))
        {
            $html = array();
            $c = '';
            $Projects = new Projects;
            foreach ($data as $v)
            {
                switch ($v['brick_size'])
                {
                    case "11":
                        $max = 100;
                        break;
                    case "12":
                        $max = 200;
                        break;
                    case "21":
                        $max = 200;
                        break;
                    case "22":
                        $max = 250;
                        break;
                    default:
                        $max = 300;
                        break;
                }
                switch ($v['g'])
                {
                    case "1":
                        $target = "project";
                        break;
                    case "2":
                        $target = "news";
                        break;
                    case "3":
                        $target = "event";
                        break;
                }
                if ($v['g'] == '1')
                {
                    $c .= '<a class="brick size' . $v['brick_size'] . ' various" data-fancybox-type="iframe" href="project_content.php?id=' . $v['id'] . '"> <img src="' . $Projects->get_img($v['img']) . '"></a>';
                }
                else
                {
                    $c .= '<a class="brick size' . $v['brick_size'] . ' various" data-color="' . $v['color'] . '" data-fancybox-type="iframe" href="' . $target . '_content.php?id=' . $v['id'] . '"><div class="content"><h1>' . $v['title'] . '</h1><p>' . mb_substr(strip_tags($v['content']), 0, $max) . '...</p><div class="lct"><span class="bfh-countries" data-country="' . $v['location'] . '" data-flags="false"></span></div><div class="year">' . substr($v['dates'], 0, 10) . '</div></div></a>';
                }
            }
            echo $c;
            exit;
        }
        break;
    case "list":
    case "list_projects":
        if ($data = $func->get_all_front($_POST['from']))
        {
            $html = array();
            $c = '';
            foreach ($data as $v)
            {
                switch ($v['brick_size'])
                {
                    case "11":
                        $max = 100;
                        break;
                    case "12":
                        $max = 200;
                        break;
                    case "21":
                        $max = 200;
                        break;
                    case "22":
                        $max = 250;
                        break;
                    default:
                        $max = 300;
                        break;
                }

                if ($DOIT == 'list_projects')
                {
                    $c .= '<a class="brick size' . $v['brick_size'] . ' various" data-fancybox-type="iframe" href="project_content.php?id=' . $v['id'] . '"> <img src="' . $func->get_img($v['img']) . '"></a>';
                }
                else
                {
                    $c .= '<a class="brick size' . $v['brick_size'] . ' various" data-color="' . $v['color'] . '" data-fancybox-type="iframe" href="news_content.php?id=' . $v['id'] . '"><div class="content"><h1>' . $v['title'] . '</h1><p>' . mb_substr(strip_tags($v['content']), 0, $max) . '...</p><div class="lct"><span class="bfh-countries" data-country="' . $v['location'] . '" data-flags="false"></span></div><div class="year">' . substr($v['dates'], 0, 10) . '</div></div></a>';
                }
                // array_push($html,addslashes($c));
            }
            echo $c;
            exit;
        }
        break;
}

if ($_REQUEST['ajax_type'] == 'json')
{
    echo (json_encode($ret));
    exit;
}