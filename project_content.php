<?php
require_once(dirname(__FILE__) . '/_init.php');

$obj = new Projects;
$Photo = new Photo;
$data = $obj->get_detail_front();
$photo = null;
if ($data['id'])
{
    $photo = $Photo->get_all(3, $data['id']);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once('inc/_head.php'); ?>
        <script src="script/jquery.cycle2.min.js"></script>
        <script>
            $(function () {

                $(".custom-caption").text(padLeft(1, 3).toString() + "/" + padLeft($("#gallery img").length, 3).toString());

                var gallery = $('#gallery').on('cycle-before', function (event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
                    $(".custom-caption").text(padLeft(optionHash.slideNum, 3).toString() + "/" + padLeft(optionHash.slideCount, 3).toString());
                }).on('cycle-initialized', function (event, optionHash) {
                    console.log(optionHash);
                    //$(".custom-caption").text(padLeft(1,3).toString()+"/"+padLeft(optionHash.slideCount,3).toString());
                });
            });
            function padLeft(str, lenght) {
                if (str.length >= lenght)
                    return str;
                else
                    return padLeft("0" + str, lenght);
            }
        </script>
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
            <div class="number custom-caption"></div>
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