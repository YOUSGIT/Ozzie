<?php

class Photo extends Superobj
{

    protected $post_arr = array();
    protected $file_arr = array();
    protected $del_arr;
    protected $limit = 2;
    protected $sort_where = "";
    protected $tbname = PHOTO;
    protected $tbname2 = PRODUCT;
    public $is_image = false;
    public $list_this;
    public $detail_this;
    public $this_Page = this_Page;
    public $detail_id;
    public $is_sort = true;
    public $sort_arr = array();
    public $sdir = UPLOAD_Image;

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
            if (is_file($this->get_dir() . "thumbnail/" . $path))
                return $this->get_dir() . "thumbnail/" . ($path);
            else
                return $this->get_dir() . $this->default_bg;
        }
    }

    function get_do_status($val)
    {
        return $this->status_arr[$val];
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
    function get_all($target = 0, $parent = 0)
    {
        $wheres = " AND a.`parent` = " . $parent;

        $this->list_this = "SELECT a.* FROM " . $this->tbname . " a WHERE 1 AND a.`target` = " . $target . $wheres . " ORDER BY a.`sequ` ASC, a.`dates` DESC";
        return parent::get_list($this->list_this);
    }

    function get_detail($pk = '')
    { //列出單筆細節
        $pk = (is_numeric($pk)) ? $pk : $this->detail_id;

        if (trim($pk) != '')
            $this->detail_this = "SELECT * FROM " . $this->tbname . " WHERE " . $this->PK . "=" . $pk;

        return parent::get_list($this->detail_this, 1);
    }

    function get_img($path)
    {
        if (true)
        {
            if (is_file($this->get_dir() . "" . $path))
                return $this->get_dir() . "" . ($path);
            else
                return $this->get_dir() . $this->default_bg;
        }
    }

    #############################################################################
    function get_all_front($target = 0, $parent = 0)
    {
        $this->list_this = "SELECT * FROM " . $this->tbname . " a WHERE 1 AND `target` = " . $target . " AND `parent` = " . (int) $parent . " " . $wheres . " ORDER BY `sequ` ASC, a.`dates` DESC";
        return parent::get_list($this->list_this);
    }

    function get_detail_front($pk)
    {
        $pk = (trim($pk) != '') ? $pk : $this->detail_id;

        if (trim($pk) != '')
            $this->detail_this = "SELECT * FROM " . $this->tbname . " WHERE  1 AND `sale` = 1 AND " . $this->PK . "=" . $pk;

        return parent::get_list($this->detail_this, 1);
    }

    function get_status($v)
    {
        return $this->status_arr[$v];
    }

    ############################################################################
    function renew($data)
    {
        if ($data)
        {
            $this->post_arr = $data;
        }
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

    function sale()
    {
        $this->post_arr;
        $sql = "UPDATE " . $this->tbname . " SET `sale` = " . (int) $this->post_arr['val'] . " WHERE 1 AND `id` = " . (int) $this->post_arr['id'];
        return parent::qry($sql);
    }

}