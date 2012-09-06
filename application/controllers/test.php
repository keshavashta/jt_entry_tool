<?php
/**
 * Created by JetBrains PhpStorm.
 * User: saxena.arunesh
 * Date: 9/4/12
 * Time: 6:07 PM
 * To change this template use File | Settings | File Templates.
 */
class Test extends CI_Controller {
    function index() {
        $instance = new Citation_Model();
        $data=array('keycode'=>"1b91d2f9200cda2b434e19a7df5842d0");
        $instance->delete_citation($data);
    }


    function test_file_loader() {
        $file_path = "E:\\HP\\jt_entry_tool\\sample\\sample.txt";

        $loader = new JT_File_Loader();
        $loader->parseJudgements($file_path);
    }

}
