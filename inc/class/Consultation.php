<?php

class Consultation extends Superobj
{

    protected $post_arr = array();
    protected $file_arr = array();
    protected $del_arr;
    protected $limit = 2;
    protected $sort_where = "";
    protected $tbname = CONSUL;
    // public $sdir = COUNTRY_Image;
    public $back = './consultation.php';
    // public $s_size = array("m" => array("w" => 1920, "h" => 1080), "s" => array("w" => 80, "h" => 80));
    public $is_image = false;
    public $list_this;
    public $detail_this;
    public $this_Page = this_Page;
    public $detail_id;
    public $is_sort = false;
    public $sort_arr = array();
    // public $status_arr = array(1 => "上架", 0 => "下架");
    public $default_bg = 'pattern1.jpg';

    ####################################################################################
    function __construct($debug = Debug)
    {
        $this->post_arr = (is_array($_POST)) ? $_POST : "";
        $this->file_arr = (is_array($_FILES)) ? $_FILES : "";
        $this->del_arr = (isset($_REQUEST['delid'])) ? $_REQUEST['delid'] : "";
        $this->detail_id = (is_numeric($_GET['id'])) ? $_GET['id'] : "";
        self::set_sort_arr();

        parent::__construct($debug);

        if (trim($this->tbname) != '')
            $this->set_field($this->tbname);
    }

    function get_dir()
    {
        return $this->sdir;
    }

    function get_pre_img($path)
    {
        if (true)
        {
            if (is_file($this->get_dir() . "s_" . $path))
                return $this->get_dir() . "s_" . $path;
            else
                return $this->get_dir() . $this->default_bg;
        }
    }

    function get_s1($val)
    {
        // 新屋裝修  中古屋   翻修   預售屋   商業空間   辦公空間
        switch ($val)
        {
            case 0:
                return '新屋裝修';
                break;

            case 1:
                return '中古屋';
                break;

            case 2:
                return '翻修';
                break;

            case 3:
                return '預售屋';
                break;

            case 4:
                return '商業空間';
                break;

            case 5:
                return '辦公空間';
                break;
        }
    }

    function get_s2($val)
    {
        // 20~40坪   40~60坪  60~80坪   80~100坪  100坪以上
        switch ($val)
        {
            case 0:
                return '20~40坪';
                break;

            case 1:
                return '40~60坪';
                break;

            case 2:
                return '60~80坪';
                break;

            case 3:
                return '80~100坪';
                break;

            case 4:
                return '100坪以上';
                break;
        }
    }

    function get_s3($val)
    {
        // 100~200萬  200~300萬   300~400萬   400~500萬   500萬以上
        switch ($val)
        {
            case 0:
                return '100~200萬';
                break;

            case 1:
                return '200~300萬';
                break;

            case 2:
                return '300~400萬';
                break;

            case 3:
                return '400~500萬';
                break;

            case 4:
                return '500萬以上';
                break;
        }
    }

    function get_s4($val)
    {
        switch ($val)
        {
            case 0:
                return '立即動工';
                break;

            case 1:
                return '一個月內';
                break;

            case 2:
                return '二個月內';
                break;

            case 3:
                return '二個月後';
                break;
        }
    }

    function get_do_status($val)
    {
        return $val != 1 ? '待處理' : '已處理';
    }

    function get_default_img($path)
    {
        if (true)
        {
            if (is_file($this->get_dir() . "s_" . $path))
                return $path;
            else
                return $this->default_bg;
        }
    }

    function get_default_bg()
    {
        return $this->default_bg;
    }

    #################################################################################################
    function get_all()
    {
        // if (is_numeric($_GET['s']) && $_GET['s'] != '')
        // $wheres = " AND `status` = " . $_GET['s'];

        $this->list_this = "SELECT * FROM " . $this->tbname . " WHERE 1 " . $wheres . " AND `del` != 1 ORDER BY `dates` DESC";
        return parent::get_list($this->list_this);
    }

    function get_detail($pk = '')
    { //列出單筆細節
        $pk = (is_numeric($pk)) ? $pk : $this->detail_id;

        if (trim($pk) != '')
            $this->detail_this = "SELECT * FROM " . $this->tbname . " where " . $this->PK . "=" . $pk;

        return parent::get_list($this->detail_this, 1);
    }

    #############################################################################
    function get_all_front()
    {
        $this->list_this = "SELECT * FROM " . $this->tbname . " WHERE 1 AND `sale` = 1 " . $wheres . " ORDER BY `sequ` ASC";
        return parent::get_list($this->list_this);
    }

    function get_detail_front($pk)
    {
        $pk = (trim($pk) != '') ? $pk : $this->detail_id;

        if (trim($pk) != '')
            $this->detail_this = "SELECT * FROM " . $this->tbname . " WHERE  1 AND `sale` = 1 AND " . $this->PK . "=" . $pk;

        return parent::get_list($this->detail_this, 1);
    }

    function get_pre_img_front($path = "")
    {
        if (is_file($this->get_dir() . $path))
            return $this->get_dir() . "" . $path;
        else
            return "img/pattern/pattern1.jpg";
    }

    function get_status($v)
    {
        return $this->status_arr[$v];
    }

    ############################################################################
    function renew()
    {
        parent::renew($this->post_arr, $this->file_arr, $this->sdir, $this->s_size);
    }

    function killu()
    {
        return parent::killu($this->del_arr, $this->is_image, $this->sdir);
    }

    function set_back($page)
    {
        $this->back = $page;
    }

    function is_sort()
    {
        return $this->is_sort;
    }

    function get_s_size()
    {
        return $this->s_size;
    }

    function set_sort_arr()
    {
        $this->sort_arr = $_POST['sort_arr'];
    }

    function get_sort_arr()
    {
        return $this->sort_arr;
    }

    function goback()
    {
        parent::goback($this->back, (!is_file("admin.admin")) ? '感謝您的諮詢，我們將盡快與您答覆!' : '更新完成');
    }

    function sale()
    {
        $this->post_arr;
        $sql = "UPDATE " . $this->tbname . " SET `sale` = " . (int) $this->post_arr['val'] . " WHERE 1 AND `id` = " . (int) $this->post_arr['id'];
        return parent::qry($sql);
    }

}