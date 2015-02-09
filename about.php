<?php require_once(dirname(__FILE__) . '/_init.php'); ?>
<?php
$site = new Site;
$content = $site->get_about();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <?php require_once('inc/_head.php'); ?>
        <script>
            $(function () {
                $("#Cht").hide();
                $("#lnkCht").on("click", function () {
                    $(this).hide();
                    $("#lnkEng").show();
                    $("#Eng").hide();
                    $("#Cht").fadeIn();
                    return false;
                });
                $("#lnkEng").hide().on("click", function () {
                    $("#lnkCht").show();
                    $(this).hide();
                    $("#Cht").hide();
                    $("#Eng").fadeIn();
                    return false;
                });
            });
        </script>
    </head>

    <body>
        <div id="container">
            <?php require_once('inc/_header.php'); ?>
            <div id="main">
                <div class="about">
                    <div class="title">About</div>
                    <div class="language"> <a href="#" id="lnkEng">ENGLISH</a> <a href="#" id="lnkCht">繁體中文</a> </div>
                    <div style="clear: both;"></div>
                    <div id="Eng" class="a_content">
                        <?= stripslashes($content['about_en']); ?>
                    </div>
                    <div id="Cht" class="a_content">
                        <?= stripslashes($content['about_zhTW']); ?>
                    </div>
                    <div class="img">
                        <h3>UPGRADE BY ART</h3>
                        <p>Curating</p>
                        <p>Content Design</p>
                        <p>Visual Communication</p>
                        <p>Exhibition/Space Design</p>
                        <p>Art Direction</p>
                        <p>Art education</p>
                        <p> Art/Space cohesive design<br>
                            <br>
                            <img src="images/about_img_dot.png" width="62" height="9"> </p>
                    </div>
                    <div style="clear: both;"></div>

                    <!-- end .about-->
                </div>
                <?php require_once('inc/_footer.php'); ?>
            </div>
        </div>
        <?php require_once('inc/_foot.php'); ?>
    </body>
</html>