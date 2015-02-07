<?php
/*
 * jQuery File Upload Plugin PHP Example 5.14
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */

error_reporting(E_ALL | E_STRICT);
require(dirname(__FILE__).'/../../../../../_init.php');
require('UploadHandler.php');
usleep(mt_rand(100,10000));
$option = array(
'upload_dir' => _ROOT.'images/photo/',
'upload_url' => WEB.'images/photo/'
);
$upload_handler = new UploadHandler($option);
