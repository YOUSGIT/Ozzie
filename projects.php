<?php require_once(dirname(__FILE__) . '/_init.php'); ?>
<?php
$obj = new Projects;
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
                <h1>Projects / Art Direction</h1>
                <div class="wall">
                    <?php
                    foreach ($data as $v)
                    {
                        $max = get_block_max_strlen($v['brick_size']);
                        ?>
                        <a class="brick size<?= $v['brick_size']; ?> various" data-fancybox-type="iframe" href="project_content.php?id=<?= $v['id']; ?>"> <img src="<?= $obj->get_img($v['img']); ?>"></a>
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
                // return false;
                $(window).scroll(function ()
                {
                    var $BodyHeight = $(document).height();
                    var $ViewportHeight = $(window).height();
                    var $ScrollTop = $(this).scrollTop();
                    if ($BodyHeight == ($ViewportHeight + $ScrollTop))
                    {
                        console.log("Here is bottom");

                        var data = {
                            func: "Projects",
                            doit: "list_projects",
                            from: base,
                            c: '<?= $_GET['c']; ?>'
                        };
                        $.post('processor.php', data, function (ret)
                        {
                            wall.appendBlock(ret);
                            base++;
                        }, 'html');
                    }
                });
            }(window);
        </script>
    </body>
</html>