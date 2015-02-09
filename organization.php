<?php require_once(dirname(__FILE__) . '/_init.php'); ?>
<?php
$site = new Site;
$content = $site->get_organization();
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
                <div id="organization">
                    <div class="title">Organization</div>
                    <?= stripslashes($content['organization']); ?>
                    <!-- end .organization-->
                </div>
                <?php require_once('inc/_footer.php'); ?>
            </div>
        </div>
        <?php require_once('inc/_foot.php'); ?>
    </body>
</html>