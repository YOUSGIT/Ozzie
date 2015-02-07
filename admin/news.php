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
                
                <div class="row tool">
                    <div class="col-lg-12">
                        <a href="project_detail.php" class="btn btn-success"><i class="fa fa-plus"></i> 新增</a>                        
                        <a class="btn btn-danger"><i class="fa fa-times"></i> 刪除</a>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>


                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>                            
                            <th>標題</th>
                            <th>發生地</th>       
                            <th>建立日期</th>
                            <th>修改</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" /></td>                            
                            <td>News Title</td>
                            <td>TAIWAN</td>
                            <td>2012/12/12 12:00pm</td>
                            <td><a href="news_detail.php" class="btn btn-sm btn-primary">修改</a></td>
                        </tr>
                         <tr>
                            <td><input type="checkbox" /></td>                            
                            <td>News Title</td>
                            <td>TAIWAN</td>
                            <td>2012/12/12 12:00pm</td>
                            <td><a href="news_detail.php" class="btn btn-sm btn-primary">修改</a></td>
                        </tr>
                         <tr>
                            <td><input type="checkbox" /></td>                            
                            <td>News Title</td>
                            <td>TAIWAN</td>
                            <td>2012/12/12 12:00pm</td>
                            <td><a href="news_detail.php" class="btn btn-sm btn-primary">修改</a></td>
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
