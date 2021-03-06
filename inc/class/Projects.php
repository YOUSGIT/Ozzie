<?php

class Projects extends Superobj implements Press
{

    protected $post_arr = array();
    protected $file_arr = array();
    protected $del_arr;
    protected $limit = 2;
    protected $sort_where = "";
    protected $tbname = PROJECTS;
    protected $tbname_photo = PHOTO;
    public $back = './projects.php';
    public $is_image = false;
    public $list_this;
    public $detail_this;
    public $this_Page = this_Page;
    public $detail_id;
    public $is_sort = true;
    public $sort_arr = array();
    public $status_arr = array(1 => "上架", 0 => "下架");
    public $default_bg = 'ozzie_logo.png';
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
    function get_all()
    {
        // if (is_numeric($_GET['s']) && $_GET['s'] != '')
        // $wheres = " AND `status` = " . $_GET['s'];

        $this->list_this = "SELECT a.* FROM " . $this->tbname . " a ORDER BY a.`sequ` ASC, a.`dates` DESC";
        // $this->list_this = "SELECT a.* FROM ".$this->tbname." a LEFT JOIN `" . $this->tbname_photo . "` b ON a.`id` = b.`parent` AND b.`target` = 1 WHERE 1 GROUP BY a.`id`";
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
            else if (is_file($this->get_dir() . $this->default_bg))
            {
                return $this->get_dir() . $this->default_bg;
            }
            else
            {
                return "images/ozzie_logo.png";
            }
        }
    }

    #############################################################################
    function get_all_front($from)
    {
        $parent = $_REQUEST['c'];
        if (is_numeric($parent))
        {
            $wheres = ' AND `catalog` LIKE \'%"' . (int) $parent . '"%\' ';
        }
        $wheres .= " AND NOW() BETWEEN `sdates` AND `edates` ";
        $this->list_this = "SELECT * FROM " . $this->tbname . " WHERE 1 " . $wheres . " ORDER BY `sequ` ASC, `sdates` DESC";
        $count = 10;
        if (!is_numeric($from))
        {
            $from = 0;
        }
        else
        {
            $from = $from * $count;
        }
        $this->list_this .= " LIMIT " . $from . ", " . $count;
        return parent::get_list($this->list_this);
    }

    function get_detail_front($pk)
    {
        $pk = (trim($pk) != '') ? $pk : $this->detail_id;
        $wheres .= " AND NOW() BETWEEN `sdates` AND `edates` ";

        if (trim($pk) != '')
            $this->detail_this = "SELECT * FROM " . $this->tbname . " WHERE 1 " . $wheres . " AND " . $this->PK . "=" . $pk;

        return parent::get_list($this->detail_this, 1);
    }

    function get_pre_img_front($path = "")
    {
        if (is_file($this->get_dir() . $path))
            return $this->get_dir() . "" . $path;
        else
            return "images/ozzie_logo.png";
    }

    function get_status($v)
    {
        return $this->status_arr[$v];
    }

    ############################################################################
    function renew()
    {
        $photos = function(&$data) {
            $data2 = $data;
            $data2['parent'] = $data2['id'];
            unset($data2['id']);
            foreach ($data2['img2'] as $v)
            {
                $data2['img'] = $v;
                $obj = new Photo;
                $obj->renew($data2);
            }
            $data['img2'] = null;
            $data['delid'] = null;
        };

        if ($_POST['img2'] && is_numeric($_POST['id']))
        {
            $photos($this->post_arr);
        }

        if (!$_POST['link_blank'] && is_numeric($_POST['id']))
        {
            $this->post_arr['link_blank'] = 0;
        }

        $this->post_arr['catalog'] = serialize($this->post_arr['catalog']);
        parent::renew($this->post_arr, $this->file_arr, $this->sdir, $this->s_size);

        if ($_POST['img2'] && !is_numeric($_POST['id']))
        {
            $this->post_arr['id'] = $this->get_lastID();
            $photos($this->post_arr);
        }
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