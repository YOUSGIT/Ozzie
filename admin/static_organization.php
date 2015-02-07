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
                        <h1 class="page-header">Organization</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Organization
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <div class="form-group">
                                            
                                            <textarea class="form-control" rows="10">Editor</textarea>                                            
                                        </div>
                                        
                                        
                                        
                                        <button class="btn btn-primary btn-lg" type="submit" class="btn btn-default">儲存</button>                                        
                                    
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


    </body>

</html>
