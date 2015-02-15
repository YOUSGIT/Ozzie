<?php require_once(dirname(__FILE__) . '/_init.php'); ?>
<?php
$obj = new News;
$data = $obj->get_all_front(0);
?>
<!DOCTYPE HTML>
<html>
    <head>

        <?php require_once('inc/_head.php'); ?>
    </head>

    <body>
        <div id="container">
            <?php require_once('inc/_header.php'); ?>
            <div id="main">
                <h1>News</h1>
                <div class="wall">
                    <?php
                    foreach ($data as $v)
                    {
                        $max = get_block_max_strlen($v['brick_size']);
                        ?>
                        <a class="brick size<?= $v['brick_size']; ?> various" data-color="<?= $v['color']; ?>" data-fancybox-type="iframe" href="news_content.php?id=<?= $v['id']; ?>">
                            <div class="content">
                                <h1><?= $v['title']; ?></h1>
                                <p><?= getSubstr(strip_tags($v['content']), 0, $max); ?>...</p>
                                <div class="lct"><span class="bfh-countries" data-country="<?= $v['location']; ?>" data-flags="false"></span></div>
                                <div class="year"><?= substr($v['dates'], 0, 4); ?></div>
                            </div>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <?php require_once('inc/_footer.php'); ?>
            </div>
        </div>
        <?php require_once('inc/_foot.php'); ?>
        <script>
            !function (window, undefined)
            {
                var base = 1;
                $(window).scroll(function ()
                {
                    var $BodyHeight = $(document).height();
                    var $ViewportHeight = $(window).height();
                    var $ScrollTop = $(this).scrollTop();
                    if ($BodyHeight == ($ViewportHeight + $ScrollTop))
                    {
                        console.log("Here is bottom");

                        var data = {
                            func: "News",
                            doit: "list",
                            from: base
                        };
                        $.post('processor.php', data, function (ret)
                        {
                            wall.appendBlock(ret);
                            refresh_country();
                            base++;
                        }, 'html');
                    }
                });
            }(window);
        </script>
    </body>
</html>