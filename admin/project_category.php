<?php require_once(dirname(__FILE__) . '/../_init.php'); ?>
<?php
$obj = new CatalogProject;
$data = $obj->get_all();
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
                <form data-target="form" role="form" method="post" action="processor.php">
                    <div class="row tool">
                        <div class="col-lg-12">
                            <a href="project_category_detail.php" class="btn btn-success"><i class="fa fa-plus"></i> 新增</a>
                            <a class="btn btn-danger" data-target="del_item"><i class="fa fa-times"></i> 刪除</a>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><input name="selectAll" type="checkbox" /></th>
                                <th>分類名稱</th>
                                <th>修改</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $v)
                            {
                                ?>
                                <tr>
                                    <td><input name="delid[]" type="checkbox" class="" value="<?php echo $v['id']; ?>" /></td>
                                    <td><?= $v['title']; ?></td>
                                    <td><?= $v['dates']; ?></td>
                                    <td><a href="project_category_detail.php?id=<?= $v['id']; ?>" class="btn btn-sm btn-primary">修改</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="func" value="CatProject"/>
                    <input type="hidden" name="doit" value="del"/>
                </form>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
        <?php require_once('inc/_foot.php'); ?>
        <script type="text/javascript">
            !function (window, undefined)
            {
                $(function ()
                {
                    var form = $('form[data-target="form"]');
                    var del_btn = $('a[data-target="del_item"]');
                    // var save_btn = $('button[data-target="save_order"]');
                    // $('table.table > tbody').sortable({ cursor: "move" });

                    $('input[name="selectAll"]').on('click', function () {
                        return form.find("tbody input[type='checkbox']").prop('checked', $(this).prop('checked'));
                    });

                    del_btn.on('click', del);
                    // save_btn.on('click', save_order).tooltip();

                    function save_order()
                    {
                        if ($('input[name="doit"]').val('sort'))
                        {
                            form.submit();
                        }
                        return false;
                    }

                    function del()
                    {
                        var ret = form.find("tbody input[type='checkbox']:checked");

                        if (!ret.length > 0)
                        {
                            alert("請選擇一個項目");
                            return false;
                        }

                        if (!confirm("確認刪除 ?"))
                            return false;

                        form.submit();
                        return false;
                    }
                });
            }(window);
        </script>
    </body>
</html>