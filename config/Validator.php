<?php

namespace config;

class Validator
{

    public function valid_file_img($file) {
        $arr_file = explode(".", $file["file_name"]);
        $ss = $arr_file[count($arr_file) - 1];
        if($ss == "png" || $ss == "svg" || $ss == "jpg" || $ss == "jpeg" || $ss == "gif") {
            return true;
        }
        return false;
    }

}