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
                                <a class="active" href="project_category.php"><i class="fa fa-bar-chart-o fa-fw"></i> 分類管理</a>                                
                            </li>
                            <li>
                                <a href="projects.php"><i class="fa fa-bar-chart-o fa-fw"></i> 作品管理</a>                                
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
                        <h1 class="page-header">分類管理</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                分類管理
                            </div>
                            <div class="panel-body">

                                <div class="col-lg-12">

                                    <div class="form-group">
                                        <label>分類名稱</label>
                                        <input type="text" class="form-control"></textarea>                                            
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
