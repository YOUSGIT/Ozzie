<?php

class DB
{

    private $hostname_prof;
    private $username_prof;
    private $password_prof;
    private $database_prof;
    private $result;
    public $result_num;
    public $ret_list = array();

    function __construct($debug = Debug)
    {
        $db = self::define_DB();

        $this->database_prof = myDB;
        $this->hostname_prof = $db[0]['Host'];
        $this->username_prof = $db[0]['User'];
        $this->password_prof = $db[0]['Pass'];

        if (!$this->prof = mysql_connect($this->hostname_prof, $this->username_prof, $this->password_prof))
            exit("error2");

        if (!mysql_select_db($this->database_prof, $this->prof))
            exit("error3" . $this->database_prof);

        $this->qry("SET NAMES UTF8", $this->prof);
        $this->qry("SET CHARACTER_SET_CLIENT=UTF8", $this->prof);
        $this->qry("SET CHARACTER_SET_RESULTS=UTF8", $this->prof);
        $this->result = null;
    }

    function define_DB($idx = '')
    {
        $path = _DBXML;

        try
        {
            if (!$dbs = simplexml_load_file($path))
            {
                Throw new Exception(_("Failed to load config file"));
            }

            foreach ($dbs->Servers->Server as $server)
            {
                foreach ($server as $k => $v)
                {
                    $DB[(int) $server['id']][(string) $k] = (string) $v;
                }

                define($server->Alias, $server->DB);
            }
        }
        catch (Exception $e)
        {
            die(_('Error[XML]:') . $e->getMessage());
        }

        return $DB;
    }

    function qry($sql)
    {
        //echo $sql;
        if (trim($sql) != '')
        {

            if (!$this->result = mysql_query($sql, $this->prof))
            {
                echo "error4" . $sql;
                return false;
            }
        }

        return true;
    }

    function num_row()
    {

        if (!$this->result)
            return false;
        else
        {

            if (!$ret = mysql_num_rows($this->result))
                return false;
            else
            {
                $this->result_num = $ret;
                return $this->result_num;
            }
        }
    }

    function quote($str)
    {
        return mysql_real_escape_string($str, $this->prof);
    }

    /*
     * @param int- $num single or multi rows
     *
     *
     *
     * */
    function get_list($sql = '', $num = '')
    {
        $this->ret_list = array();


        if (trim($sql) != '')
        {

            if (!$this->qry($sql))
                return false;
        }

        if (!$this->result)
            return false;
        else
        {

            if ($num != 1)
            {

                while ($ret = mysql_fetch_assoc($this->result))
                    array_push($this->ret_list, $ret);

                return $this->ret_list;
            }
            else
            {
                if (!$ret = mysql_fetch_assoc($this->result))
                    return false;
                else
                    return $ret;
            }
        }
    }

    function get_lastID()
    {
        return mysql_insert_id();
    }

    protected function list_tb()
    {

        $this->ret_list = array();

        if (!$result = mysql_list_tables($this->database_prof, $this->prof))
            return false;
        else
        {

            while ($ret = mysql_fetch_row($result))
                array_push($this->ret_list, $ret[0]);

            return $this->ret_list;
        }
    }

    public function __call($name, $arguments)
    {

        echo "Calling object method '$name' "
        . implode(', ', $arguments) . "\n";
    }

}