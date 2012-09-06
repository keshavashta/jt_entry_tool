<?php
/**
 * Created by JetBrains PhpStorm.
 * User: KESHAV
 * Date: 6/9/12
 * Time: 6:44 AM
 * To change this template use File | Settings | File Templates.
 */

 function get_line_seperated_text($text)
{
    if (empty($text))
        return "";
    else
        return str_replace("\n", "</br>", $text);

}