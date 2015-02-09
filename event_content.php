<?php
require_once(dirname(__FILE__) . '/_init.php');

$obj = new Events;
$Photo = new Photo;
$data = $obj->get_detail_front();
$photo = null;
if ($data['id'])
{
    $photo = $Photo->get_all(2, $data['id']);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once('inc/_head.php'); ?>
        <script src="script/jquery.cycle2.min.js"></script>
    </head>
    <body class="box">
        <div class="work">
            <div id="gallery" class="photo cycle-slideshow"
                 data-cycle-log ="false"
                 data-cycle-fx="fade"
                 data-cycle-pause-on-hover="true"
                 data-cycle-speed="500"
                 data-cycle-timeout="0"
                 data-cycle-prev="#prev"
                 data-cycle-next="#next">
                     <?php
                     foreach ($photo as $v)
                     {
                         ?>
                    <img src="<?= $obj->get_pre_img_front($v['img']); ?>">
                    <?php
                }
                ?>
            </div>
            <div class="number custom-caption"><span class="bfh-countries" data-country="<?= $data['location']; ?>" data-flags="false"></span></div>
            <div class="title"><?= $data['title']; ?></div>
            <div class="year"><?= substr($data['dates'], 0, 10); ?></div>
            <div class="control">
                <span id="prev" class="prev"><a href="#">< </a></span>
                <span id="next" class="next"><a href="#">> </a></span>
            </div>
            <div style="clear: both"></div>
            <div class="content"><?= ($data['content']); ?></div>
        </div>
    </body>
</html>