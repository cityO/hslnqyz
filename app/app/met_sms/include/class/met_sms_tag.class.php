<?php


load::sys_class('view/tag');

class met_sms_tag extends tag {
    // 必须包含Tag属性 不可修改
    public $Tag = array(
        'user'     => array( 'block' => 1, 'level' => 4 ),
    );  


    public function user( $attr, $content ) {
        $row = isset( $attr['row'] ) ? $attr['row'] : 20;
        $php
             = <<<str
        <?php
               echo 12123213;
            ?>
str;
        return $php;

    }
  
}