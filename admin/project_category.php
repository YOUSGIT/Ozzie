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


                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>
                            <th>分類名稱</th>                            
                            <th>修改</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>Curating</td>                            
                            <td><a href="project_category_detail.php" class="btn btn-sm btn-primary">修改</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>Art Direction</td>
                            <td><a href="project_category_detail.php" class="btn btn-sm btn-primary">修改</a></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>Exhibition Design</td>
                            <td><a href="project_category_detail.php" class="btn btn-sm btn-primary">修改</a></td>
                        </tr>
                    </tbody>
                </table>



            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php require_once('inc/_foot.php'); ?>


    </body>

</html>
