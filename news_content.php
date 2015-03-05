<?php
require_once(dirname(__FILE__) . '/_init.php');

$obj = new News;
$Photo = new Photo;
$data = $obj->get_detail_front();
$photo = null;
if ($data['id']) {
    $photo = $Photo->get_all(1, $data['id']);
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once('inc/_head.php'); ?>

        <meta property="og:title" content="<?= $data['title']; ?>" />        
        <meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
        <meta property="og:image" content="http://<?= $_SERVER['HTTP_HOST'] .'/'. str_replace(' ', '%20', $obj->get_pre_img_front($photo[0]['img'])) ?>" />

        <script src="script/jquery.cycle2.min.js"></script>
    </head>
    <body class="box">
        <div id="container">
            <?php require_once('inc/_header.php'); ?>
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
                         foreach ($photo as $v) {
                             ?>
                        <img src="<?= $obj->get_pre_img_front($v['img']); ?>">
                        <?php
                    }
                    ?>
                </div>
                <div class="number custom-caption"><span class="bfh-countries" data-country="<?= $data['location']; ?>" data-flags="false"></span></div>
                <div class="title"><?= $data['title']; ?></div>
                <div class="year"><?= substr($data['dates'], 0, 4); ?></div>
                <div class="control">
                    <span id="prev" class="prev"><a href="#">< </a></span>
                    <span id="next" class="next"><a href="#">> </a></span>
                </div>
                <div style="clear: both"></div>
                <div class="content"><?= (stripslashes($data['content'])); ?></div>

            </div>
            <ul class="share">
                <li><a class="facebook" href="javascript: void(window.open('http://www.facebook.com/share.php?u='.concat(encodeURIComponent(location.href)) ));"></a></li>
                <li><a class="weibo" href="javascript:(function(){window.open('http://v.t.sina.com.cn/share/share.php?title='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href)+'&source=bookmark','_blank','width=450,height=400');})()"></a></li>
                <li><a class="pinterest" target="_blank" href="javascript:void((function(){var%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)})());" class="pin-it-button" count-layout="none"></a></li>
                <li><a class="google" href="javascript: void(window.open('https://plus.google.com/share?url='.concat(encodeURIComponent(location.href)), '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600'));"></a></li>
            </ul>
        </div>
        <?php require_once('inc/_foot.php'); ?>
    </body>
</html>