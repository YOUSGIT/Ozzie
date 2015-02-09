<?php
require_once(dirname(__FILE__) . '/../_init.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('inc/_head.php'); ?>
    </head>
    <body>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
                <?php require_once('inc/_header.php'); ?>
            </nav>
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">更變密碼</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                更變密碼
                            </div>
                            <div class="panel-body">

                                <div class="col-lg-12">
                                    <form data-target='form' role="form" method="post" action="processor.php" class="form-horizontal">

                                        <div class="form-group">
                                            <label>原密碼</label>
                                            <input name="pw" type="password" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label>新密碼</label>
                                            <input name="npw1" type="password" class="form-control" />
                                        </div>

                                        <div class="form-group">
                                            <label>再次輸入新密碼</label>
                                            <input name="npw2" type="password" class="form-control" />
                                        </div>

                                        <button class="btn btn-primary btn-lg" type="submit" class="btn btn-default">儲存</button>
                                        <input type="hidden" value="1" name="id"/>
                                        <input type="hidden" value="profile" name="back"/>
                                        <input type="hidden" value="pw" name="doit"/>
                                        <input type="hidden" value="Site" name="func"/>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

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
        <script src="js/jquery.validate.min.js"></script>
        <script src="//malsup.github.io/min/jquery.form.min.js"></script>
        <script type="text/javascript">
            !function (window, undefined)
            {
                $(function ()
                {
                    var validator;
                    var _FORM = $("form[data-target='form']");

                    $(function ()
                    {
                        validator = _FORM.validate();
                        $('#save').off().on('click', save)
                    });

                    function save()
                    {
                        if (_FORM.valid())
                            _FORM.submit();

                        return false;
                    }
                });
            }(window);
        </script>
    </body>
</html>