<?php require_once(dirname(__FILE__) . '/_init.php'); ?>
<?php
$obj = new Site;
$Projects = new Projects;
$data = $obj->get_index_wall(0);
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
                <div class="wall">
                    <?php
                    foreach ($data as $v)
                    {
                        $max = get_block_max_strlen($v['brick_size']);
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
                            ?>
                            <a class="brick size<?= $v['brick_size']; ?> various" data-fancybox-type="iframe" href="project_content.php?id=<?= $v['id']; ?>"> <img src="<?= $Projects->get_img($v['img']); ?>"></a>
                            <?php
                        }
                        else
                        {
                            ?>
                            <a class="brick size<?= $v['brick_size']; ?> various" data-color="<?= $v['color']; ?>" data-fancybox-type="iframe" href="<?= $target; ?>_content.php?id=<?= $v['id']; ?>">
                                <div class="content">
                                    <h1><?= $v['title']; ?></h1>
                                    <p><?= getSubstr(strip_tags($v['content']), 0, $max); ?>...</p>
                                    <div class="lct"><span class="bfh-countries" data-country="<?= $v['location']; ?>" data-flags="false"></span></div>
                                    <div class="year"><?= substr($v['dates'], 0, 10); ?></div>
                                </div>
                            </a>
                            <?php
                        }
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
                            func: "Site",
                            doit: "list_index",
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