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
        $instance = new Judgement();
        var_dump($instance->get_judgement_count());
    }


    function test_file_loader() {
        $file_path = "E:\\HP\\jt_entry_tool\\sample\\sample.txt";

        $loader = new JT_File_Loader();
        $loader->parseJudgements($file_path);
    }

}
