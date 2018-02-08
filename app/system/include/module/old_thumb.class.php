<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved. 

defined('IN_MET') or exit('No permission');

load::sys_class('web');

class old_thumb extends web{	

	  public function doshow(){
        global $_M;
        
        $_M['form']['dir'] = str_replace('../', '', $_M['form']['dir']);


        if(strstr(str_replace($_M['url']['site'], '', $_M['form']['dir']), 'http')){
            header("Content-type: image/jpeg");
            ob_start();
            readfile($_M['form']['dir']);
            ob_flush();
            flush();
            die;
        }

        if($_M['form']['pageset']){
          $path = $_M['form']['dir']."&met-table={$_M['form']['met-table']}&met-field={$_M['form']['met-field']}";
          
        }else{
          $path = $_M['form']['dir'];
        }
        $image =  thumb($path,$_M['form']['x'],$_M['form']['y']);
        if($_M['form']['pageset']){
          $img = explode('?', $image);
          $img = $img[0];
        }else{
          $img = $image;
        }
        if($img){
            header("Content-type: image/jpeg");
            ob_start();
            readfile($img);
            ob_flush();
            flush();
        }
        
    }
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>