<?php require_once(dirname(__FILE__) . '/../_init.php'); ?>
<?php
$site = new Site;
$content = $site->get_about();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('inc/_head.php'); ?>
        <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <?php require_once('inc/_header.php'); ?>
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a class="active" href="static_about.php"><i class="fa fa-bar-chart-o fa-fw"></i> About</a>
                            </li>
                            <li>
                                <a href="static_organization.php"><i class="fa fa-bar-chart-o fa-fw"></i> Organization</a>
                            </li>
                            <li>
                                <a href="static_contact.php"><i class="fa fa-bar-chart-o fa-fw"></i> Contact</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">About</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                About
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form role="form" method="post" action="processor.php">
                                            <div class="form-group">
                                                <label>中文</label>
                                                <textarea name="about_zhTW" class="form-control" rows="10"><?= stripslashes($content['about_zhTW']); ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>英文</label>
                                                <textarea name="about_en" class="form-control" rows="10"><?= stripslashes($content['about_en']); ?></textarea>
                                            </div>
                                            <button class="btn btn-primary btn-lg" type="submit" class="btn btn-default">儲存</button>
                                            <input type="hidden" value="1" name="id"/>
                                            <input type="hidden" value="renew" name="doit"/>
                                            <input type="hidden" value="<?= basename(__FILE__, '.php') ?>" name="back"/>
                                            <input type="hidden" value="Site" name="func"/>
                                        </form>
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php require_once('inc/_foot.php'); ?>
        <script type="text/javascript">
            CKEDITOR.replace("about_zhTW");
            CKEDITOR.replace("about_en");
            CKEDITOR.config.allowedContent = true;
        </script>
    </body>
</html>