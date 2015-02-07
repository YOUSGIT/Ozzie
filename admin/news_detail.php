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

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">                            
                            <li>
                                <a class="active" href="news.php"><i class="fa fa-bar-chart-o fa-fw"></i> 新聞管理</a>                                
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
                        <h1 class="page-header">新聞管理</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                新增新聞
                            </div>
                            <div class="panel-body">

                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label>標題</label>
                                        <input type="text" class="form-control">                                            
                                    </div>

                                    <div class="form-group">
                                        <label>發生地</label>
                                        <select class="form-control">
                                            <option>TAIWAN</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>日期</label>
                                        <input type="text" class="form-control" />
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label>開始時間</label>
                                            <input type="text" class="form-control" />
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>結束時間</label>
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>更多資訊連結</label>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <input type="text" class="form-control" />
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="checkbox">
                                                    <label><input type="checkbox" /> 另開視窗</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>文字敘述</label>
                                        <textarea rows="5" class="form-control"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>內容圖片（批次上傳）</label>
                                        多圖上傳
                                    </div>

                                    <button class="btn btn-primary btn-lg" type="submit" class="btn btn-default">儲存</button>                                        

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


    </body>

</html>
