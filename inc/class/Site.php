<?php

class Site extends Superobj
{

    protected $post_arr = array();
    protected $file_arr = array();
    protected $del_arr;
    // upload file size limit
    protected $limit = 2;
    protected $sort_where;
    protected $tbname = SITE;
    protected $tbname1 = PROJECTS;
    protected $tbname2 = NEWS;
    protected $tbname3 = EVENTS;
    var $sdir;
    var $back = './index.php';
    var $this_Page = this_Page;
    var $detail_id;
    var $is_sort = false;
    var $sort_arr = array();

    ####################################################################################
    function __construct($debug = Debug)
    {
        parent::__construct($debug);

        $this->post_arr = (is_array($_POST)) ? $_POST : "";
        // $this->file_arr = (is_array($_FILES)) ? $_FILES : "";
        // $this->sort_arr = (isset($_POST['sort'])) ? $_POST['sort'] : "";
        // $this->del_arr = (isset($_REQUEST['delid'])) ? $_REQUEST['delid'] : "";
        // $this->detail_id = (is_numeric($_GET['id'])) ? $_GET['id'] : "";

        if (trim($this->tbname) != '')
            $this->set_field($this->tbname);
    }

    function get_organization()
    {
        $sql = "SELECT a.`organization` FROM " . $this->tbname . " a LIMIT 1";
        return parent::get_list($sql, 1);
    }

    function get_contact()
    {
        $sql = "SELECT a.`contact` FROM " . $this->tbname . " a LIMIT 1";
        return parent::get_list($sql, 1);
    }

    function get_about()
    {
        $sql = "SELECT a.`about_en`, a.`about_zhTW` FROM " . $this->tbname . " a LIMIT 1";
        return parent::get_list($sql, 1);
    }

    function get_index_wall($from)
    {
        $wheres .= " AND NOW() BETWEEN `sdates` AND `edates` ";

        $this->list_this = "";
        for ($i = 1; $i <= 3; $i++)
        {
            $this->list_this .= "( SELECT *, @group := " . $i . " as `g` FROM `" . $this->{'tbname' . $i} . "` WHERE 1 " . $wheres . " ORDER BY `sequ` ASC, `sdates` DESC )";

            if ($i < 3)
            {
                $this->list_this .=" UNION ";
            }
        }
        $sql = "SELECT a.* FROM (" . $this->list_this . ") a ORDER BY a.`sdates` DESC ";
        // dd($sql);
        $count = 10;
        if (!is_numeric($from))
        {
            $from = 0;
        }
        else
        {
            $from = $from * $count;
        }
        $sql .= "LIMIT " . $from . ", " . $count;

        // dd($this->list_this);
        return parent::get_list($sql);
    }

    function login()
    {
        $sql = "SELECT * FROM " . $this->tbname . " WHERE `username` = '" . $this->quote($_POST['id']) . "' AND `pw` = '" . $this->quote(md5($_POST['pw'])) . "'";
        return parent::get_list($sql, 1);
    }

    function setSession($ret)
    {
        if (!is_array($ret))
            return false;

        // $lang = $_SESSION[$this->lang_key];

        session_destroy();
        session_start();
        $_SESSION['AdmiN'] = ($ret['username']);
        $_SESSION['sid'] = (session_id());
        $_SESSION['token'] = md5($ret['username'] . $_SESSION['sid']);
        $_SESSION['loginObj'] = serialize($this);
        // $_SESSION[$this->lang_key] = $lang;
        return true;
    }

    static function login_box()
    {
        return '<div id="logout">Welcome, ' . $_SESSION['AdmiN'] . '  |  <a href="logout.php"> Logout</a></div>';
    }

    static function get_admin_id()
    {
        return $_SESSION['AdmiN'];
    }

    static function checkLogin()
    {
        if ($_SESSION['AdmiN'])
            $AdmiN = $_SESSION['AdmiN'];

        $excludeArr = array("login.php", "index.php", "logincheck.php", "logout.php");

        if ((!isset($AdmiN) || empty($AdmiN) || $_SESSION['token'] != md5($AdmiN . $_SESSION['sid'])) && file_exists("admin.admin"))
            if (!in_array(this_Page, $excludeArr))
                header("Location:  ./");
    }

    function modPW()
    {
        $sql = "SELECT * FROM " . $this->tbname . " WHERE `pw` = '" . md5($this->post_arr['pw']) . "'";
        $this->back = $this->post_arr['back'] . ".php";

        if (!$ret = $this->get_list($sql, 1))
        {
            goback($this->back, 0, "原密碼有誤");
            exit;
        }

        if (($this->post_arr['npw1'] == $this->post_arr['npw2']) && $this->post_arr['npw1'] != '')
        {
            $sql = "UPDATE " . $this->tbname . " SET `id` = '" . $this->quote($this->post_arr['id']) . "', `pw` = '" . md5($this->post_arr['npw1']) . "' WHERE `id` = '" . $ret['id'] . "'";

            if ($this->qry($sql))
                goback("logout.php", 0, "更新成功，請重新登入");
            else
                goback("logout.php", 0, "更新失敗[077]");
        }
        else
            goback($this->back, 0, "請再次確認新密碼");

        exit;
    }

    #################################################################
    function is_sort()
    {
        return $this->is_sort;
    }

    function goback($url = "", $title = "", $sec = 0)
    {
        parent::goback();
    }

    function renew()
    {
        $this->back = './' . $this->post_arr['back'] . '.php';
        parent::renew($this->post_arr, $this->file_arr, $this->sdir, $this->s_size);
    }

}