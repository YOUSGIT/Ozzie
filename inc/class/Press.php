<?php

interface Press
{
    public function get_dir();
    function get_pre_img($path);
    function get_default_img($path);
    function get_default_bg();



#################################################################################################
    function get_all();
    function get_img($path);



#############################################################################
    function get_all_front($parent);
    function get_detail_front($pk);
    function get_pre_img_front($path = "");
    function get_status($v);



############################################################################
    function renew();
    function killu();
}