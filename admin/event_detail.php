<?php
require_once(dirname(__FILE__) . '/../_init.php');

$obj = new Events;
$Photo = new Photo;
$data = $obj->get_detail();
$photo = null;
if ($data['id'])
{
    $photo = $Photo->get_all(2, $data['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('inc/_head.php'); ?>
        <!-- Bootstrap Form Helpers -->
        <link href="../script/BootstrapFormHelpers-master/dist/css/bootstrap-formhelpers.min.css" rel="stylesheet" media="screen">
        <style>
            label.error
            {
                color: red;
                font-weight: normal;
                font-size: 11px;
            }
        </style>
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
                                <a class="active" href="news.php"><i class="fa fa-bar-chart-o fa-fw"></i> 大紀事管理</a>
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
                        <h1 class="page-header">大紀事管理</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <?= is_numeric($data['id']) ? '修改' : '新增' ?>大紀事
                            </div>
                            <div class="panel-body">
                                <div class="col-lg-12">
                                    <form class="" role="form" method="post" data-target='form' action="processor.php">

                                        <div class="form-group">
                                            <label>標題</label>
                                            <input type="text" name="title" value="<?= $data['title']; ?>" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <label>發生地</label>
                                            <div class="bfh-selectbox bfh-countries" data-name="location" data-country="<?= $data['location'] ?>" data-flags="true">
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-2">
                                            <label>日期</label>
                                            <input name="dates" readonly type="text" value="<?= date("Y-m-d"); ?>" class="form-control" required/>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-lg-2">
                                                <label>開始時間</label>
                                                <input name="sdates"  value="<?= $data['sdates']; ?>" readonlytype="text" class="form-control" required/>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label>結束時間</label>
                                                <input name="edates"  value="<?= !$data['edates'] ? '2070-12-31 00:00:00' : $data['edates']; ?>" readonly type="text" class="form-control" required/>
                                            </div>
                                            <div class="form-group col-lg-1">
                                                <label>方塊大小</label>
                                                <select name="brick_size" class="form-control">
                                                    <option value="11" <?= $data['brick_size'] == "11" ? 'selected="selected"' : ''; ?>>1x1</option>
                                                    <option value="12" <?= $data['brick_size'] == "12" ? 'selected="selected"' : ''; ?>>1x2</option>
                                                    <option value="21" <?= $data['brick_size'] == "21" ? 'selected="selected"' : ''; ?>>2x1</option>
                                                    <option value="22" <?= $data['brick_size'] == "22" ? 'selected="selected"' : ''; ?>>2x2</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-2">
                                                <label>方塊色彩</label>
                                                <div class="bfh-colorpicker" data-name="color" data-color="<?= $data['color'] != '' ? $data['color'] : '#DDDDDD'; ?>" data-close="false">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>更多資訊連結</label>
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <input type="text" class="form-control" value="<?= $data['morelink']; ?>" name="morelink"/>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="checkbox">
                                                        <label><input type="checkbox" name="link_blank" value="1" <?= $data['link_blank'] == '1' ? 'checked="checked"' : '' ?>/> 另開視窗</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>文字敘述</label>
                                            <textarea rows="5" class="form-control" name="content"><?= stripslashes($data['content']); ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>內容圖片</label>
                                            <!-- The file input field used as target for the file upload widget -->
                                            <input id="fileupload2" type="file" name="files[]" multiple/>
                                            <br/>
                                            <br/>
                                            <div id="progress2" class="progress">
                                                <div class="progress-bar progress-bar-success"></div>
                                            </div>
                                            <div id="files2" class="files"></div>
                                            <hr/>
                                            <?php
                                            if ($data['id'])
                                            {
                                                ?>
                                                <div>
                                                    <?php
                                                    foreach ($photo as $v)
                                                    {
                                                        ?>
                                                        <div style="display: inline-table;"><a href="<?= UPLOAD_Image . $v['img']; ?>" target="_blank"><img class="img-thumbnail" src="<?= $obj->get_pre_img($v['img']); ?>"/></a><br/><label>刪除 <input name="delid[]" type="checkbox" class="checkbox_thumbnail check-item" value="<?php echo $v['id']; ?>"/></label></div>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                            <?php }
                                            ?>
                                        </div>
                                        <button id="save" class="btn btn-primary btn-lg" type="submit" class="btn btn-default">儲存</button>
                                        <button type="button" data-target="del_item" class="btn btn-danger" data-placement="top" title="刪除勾選的圖片"><span class="glyphicon glyphicon-minus" ></span> 刪除圖片</button>&nbsp;
                                        <a href="events.php" class="btn btn-default"><span class="glyphicon glyphicon-log-out"></span> 取消</a>
                                        <!--<button type="submit" class="btn btn-info">儲存</button>-->
                                        <input type="hidden" value="<?= $data['id'] ?>" name="id"/>
                                        <input type="hidden" value="<?= $data['img'] ?>" name="img" />
                                        <input type="hidden" value="<?= $data['img1'] ?>" name="img1" />
                                        <input type="hidden" value="<?= basename(__FILE__, '.php') ?>" name="back"/>
                                        <input type="hidden" value="renew" name="doit"/>
                                        <input type="hidden" value="Events" name="func"/>
                                        <input type="hidden" value="2" name="target"/>
                                        <input type="hidden" value="" name="ajax_type"/>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.7.0/underscore-min.js" type="text/javascript"></script>
        <script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
        <script src="//malsup.github.io/min/jquery.form.min.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
        <script type="text/javascript" src="js/jQuery-File-Upload-9.9.3/js/vendor/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="js/jQuery-File-Upload-9.9.3/js/jquery.iframe-transport.js"></script>
        <script type="text/javascript" src="js/jQuery-File-Upload-9.9.3/js/jquery.fileupload.js"></script>
        <script src="js/jQuery-File-Upload-9.9.3/js/jquery.fileupload-process.js"></script>
        <script src="js/jQuery-File-Upload-9.9.3/js/jquery.fileupload-image.js"></script>
        <script src="js/jQuery-File-Upload-9.9.3/js/jquery.fileupload-audio.js"></script>
        <script src="js/jQuery-File-Upload-9.9.3/js/jquery.fileupload-video.js"></script>
        <script src="js/jQuery-File-Upload-9.9.3/js/jquery.fileupload-validate.js"></script>
        <script src="../script/BootstrapFormHelpers-master/dist/js/bootstrap-formhelpers-countries.zh_TW.js"></script>
        <script src="../script/BootstrapFormHelpers-master/dist/js/bootstrap-formhelpers.min.js"></script>
        <script type="text/javascript">
            !function (window, undefined)
            {
                $(function ()
                {
                    var validator;
                    var del_btn = $('button[data-target="del_item"]');
                    var _FORM = $("form[data-target='form']");
                    set_datetimepicker($('input[name="sdates"]'));
                    set_datetimepicker($('input[name="edates"]'));
                    set_datepicker($('input[name="dates"]'));
                    jQuery.extend(jQuery.validator.messages, {
                        required: "*必填欄位",
                    });

                    CKEDITOR.replace("content");
                    CKEDITOR.config.allowedContent = true;
                    validator = _FORM.validate();
                    // $('#save').off().on('click', save);
                    del_btn.off().on('click', del).tooltip();
                    custom_colorpicker();

                    function custom_colorpicker()
                    {
                        return $('[data-toggle="bfh-colorpicker"]').find('input').removeAttr('readonly').attr('maxlength', 7).on("change", function ()
                        {
                            return $('span.bfh-colorpicker-icon').css("background-color", $(this).val());
                        });
                    }

                    function del()
                    {
                        var data = _FORM.serializeArray();
                        var b = _.findWhere(data, {name: 'func'})
                        var c = _.findWhere(data, {name: 'doit'})
                        var d = _.findWhere(data, {name: 'ajax_type'})
                        data[_.indexOf(data, b)].value = 'Photo';
                        data[_.indexOf(data, c)].value = 'del';
                        data[_.indexOf(data, d)].value = 'json';

                        $.post('processor.php', data, function (ret)
                        {
                            var target = $('.checkbox_thumbnail:checked');
                            if (target.length > 0) {
                                if (confirm('確認刪除?')) {
                                    if (ret.ret == '1') {
                                        target.parent().parent().fadeOut(function () {
                                            $(this).remove();
                                        });
                                    } else {
                                        alert('刪除失敗，請重新操作');
                                    }
                                }
                            } else {
                                alert('請勾選圖片');
                            }
                        }, 'json');
                    }

                    function set_datetimepicker(e)
                    {
                        $.getScript("js/jquery-ui-timepicker-addon.js", function ()
                        {
                            e.datetimepicker(
                                {
                                    showSecond: true,
                                    timeFormat: 'HH:mm:ss',
                                    dateFormat: "yy-mm-dd"
                                }).css("cursor", "pointer");
                            // .css("width", "120");
                        });
                    }

                    function set_datepicker(e)
                    {
                        e.datepicker(
                            {
                                dateFormat: "yy-mm-dd"
                            }).css("cursor", "pointer");
                    }

                    function save()
                    {
                        if (_FORM.valid())
                        {
                            // if (!_FORM.find('input[name="img"]').val().length > 0)
                            // {
                            // return alert('請上傳封面');
                            // }

                            // if (!_FORM.find('input[name="img1"]').val().length > 0)
                            // {
                            // return alert('請上傳內容頁圖片');
                            // }
                            _FORM.submit();
                        }
                        else
                        {
                            return alert("請完整填寫內容");
                        }

                        return false;
                    }

                    var url = 'js/jQuery-File-Upload-9.9.3/server/php/';

                    ////////////////////////////////////////

                    $('#fileupload2').fileupload(
                        {
                            url: url,
                            dataType: 'json',
                            autoUpload: true,
                            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                            maxFileSize: 5000000, // 5 MB
                            // Enable image resizing, except for Android and Opera,
                            // which actually support image resizing, but fail to
                            // send Blob objects via XHR requests:
                            disableImageResize: /Android(?!.*Chrome)|Opera/
                                .test(window.navigator.userAgent),
                            previewMaxWidth: 100,
                            previewMaxHeight: 100,
                            previewCrop: true
                        }).on('fileuploadadd', function (e, data)
                    {
                        // data.context = $('#files2').html($('<div/>'));
                        data.context = $('<span style="display: inline-table; margin-right: 2px;"/>').appendTo('#files2');
                        $.each(data.files, function (index, file)
                        {
                            var node = $('<p/>').append('<label>刪除 <input name="delid[]" type="checkbox" class="checkbox_thumbnail check-item"/></label><input name="img2[]" value="' + file.name + '" type="hidden"/>');

                            if (!index)
                            {
                                // node.append('<br>').append(uploadButton.clone(true).data(data));
                            }
                            node.appendTo(data.context);
                        });
                    }).on('fileuploadprocessalways', function (e, data)
                    {
                        var index = data.index,
                            file = data.files[index],
                            node = $(data.context.children()[index]);
                        if (file.preview)
                        {
                            node.prepend('<br/>').prepend(file.preview);
                        }
                        if (file.error)
                        {
                            node.append('<br/>').append($('<span class="text-danger"/>').text(file.error));
                        }
                        if (index + 1 === data.files.length)
                        {
                            data.context.find('button').text('上傳').prop('disabled', !!data.files.error);
                        }
                    }).on('fileuploadprogressall', function (e, data)
                    {
                        var progress = parseInt(data.loaded / data.total * 100, 10);
                        $('#progress2 .progress-bar').css(
                            'width',
                            progress + '%'
                            );
                    }).on('fileuploaddone', function (e, data)
                    {
                        $.each(data.result.files, function (index, file)
                        {
                            if (file.url)
                            {
                                var link = $('<a>')
                                    .attr('target', '_blank')
                                    .prop('href', file.url);
                                $(data.context.children()[index])
                                    .wrap(link);
                                $(data.context.children()[index]).find('input[name="img2[]"]').val(file.name);
                            }
                            else if (file.error)
                            {
                                var error = $('<span class="text-danger"/>').text(file.error);
                                $(data.context.children()[index])
                                    .append('<br/>')
                                    .append(error);
                            }
                        });
                    }).on('fileuploadfail', function (e, data)
                    {
                        $.each(data.files, function (index)
                        {
                            var error = $('<span class="text-danger"/>').text('File upload failed.');
                            $(data.context.children()[index])
                                .append('<br/>')
                                .append(error);
                        });
                    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
                });
            }(window);
        </script>
    </body>
</html>