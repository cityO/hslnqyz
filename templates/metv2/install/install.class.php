<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

define ('TEM_INSTALL_VER', '1.000');

class install {
	function dosql(){
		global $_M;		
		
$sql = array (
  0 => 'pos =\'0\',no_order=\'1\',type=\'1\',style=\'3\',selectd=\'\',name =\'\',value=\'\',defaultvalue=\'\',valueinfo =\'页面设置\',tips=\'\'',
  1 => 'pos =\'1\',no_order=\'1\',type=\'1\',style=\'3\',selectd=\'\',name =\'\',value=\'\',defaultvalue=\'\',valueinfo =\'页面设置\',tips=\'\'',
  2 => 'pos =\'0\',no_order=\'2\',type=\'2\',style=\'0\',selectd=\'\',name =\'fontfamily\',value=\'\',defaultvalue=\'\',valueinfo =\'页面默认字体\',tips=\'\'',
  3 => 'pos =\'1\',no_order=\'2\',type=\'2\',style=\'0\',selectd=\'\',name =\'imgwidth\',value=\'120\',defaultvalue=\'120\',valueinfo =\'首页中部横向滚动图片宽度\',tips=\'\'',
  4 => 'pos =\'0\',no_order=\'3\',type=\'2\',style=\'0\',selectd=\'\',name =\'fontsize\',value=\'\',defaultvalue=\'\',valueinfo =\'页面默认文字大小\',tips=\'\'',
  5 => 'pos =\'1\',no_order=\'3\',type=\'2\',style=\'0\',selectd=\'\',name =\'imgheight\',value=\'120\',defaultvalue=\'120\',valueinfo =\'首页中部横向滚动图片高度\',tips=\'\'',
  6 => 'pos =\'0\',no_order=\'4\',type=\'2\',style=\'0\',selectd=\'\',name =\'fontcolor\',value=\'\',defaultvalue=\'\',valueinfo =\'页面默认文字颜色\',tips=\'\'',
  7 => 'pos =\'1\',no_order=\'4\',type=\'2\',style=\'0\',selectd=\'\',name =\'casewidth\',value=\'75\',defaultvalue=\'75\',valueinfo =\'首页中部横向滚动图片宽度\',tips=\'\'',
  8 => 'pos =\'0\',no_order=\'5\',type=\'2\',style=\'0\',selectd=\'\',name =\'urlcolor\',value=\'\',defaultvalue=\'\',valueinfo =\'页面默认超链接文字颜色\',tips=\'\'',
  9 => 'pos =\'1\',no_order=\'5\',type=\'2\',style=\'0\',selectd=\'\',name =\'caseheight\',value=\'60\',defaultvalue=\'60\',valueinfo =\'首页中部横向滚动图片高度\',tips=\'\'',
  10 => 'pos =\'0\',no_order=\'6\',type=\'2\',style=\'0\',selectd=\'\',name =\'hovercolor\',value=\'\',defaultvalue=\'\',valueinfo =\'页面默认鼠标移至超链接时文字颜色\',tips=\'\'',
  11 => 'pos =\'1\',no_order=\'6\',type=\'2\',style=\'0\',selectd=\'\',name =\'Column1\',value=\'联系方式\',defaultvalue=\'联系方式\',valueinfo =\'内页左侧导航下方栏目标题\',tips=\'\'',
  12 => 'pos =\'0\',no_order=\'7\',type=\'2\',style=\'0\',selectd=\'\',name =\'backgroundcolor\',value=\'\',defaultvalue=\'\',valueinfo =\'页面默认页面背景颜色\',tips=\'\'',
  13 => 'pos =\'1\',no_order=\'7\',type=\'2\',style=\'0\',selectd=\'\',name =\'Column2\',value=\'联系方式\',defaultvalue=\'联系方式\',valueinfo =\'首页页面文字\',tips=\'\'',
  14 => 'pos =\'0\',no_order=\'8\',type=\'2\',style=\'0\',selectd=\'\',name =\'logotop\',value=\'5\',defaultvalue=\'5\',valueinfo =\'logo与顶部的距离\',tips=\'\'',
  15 => 'pos =\'1\',no_order=\'8\',type=\'2\',style=\'0\',selectd=\'\',name =\'Column3\',value=\'公司简介\',defaultvalue=\'公司简介\',valueinfo =\'首页页面文字\',tips=\'\'',
  16 => 'pos =\'0\',no_order=\'9\',type=\'2\',style=\'0\',selectd=\'\',name =\'logoleft\',value=\'5\',defaultvalue=\'5\',valueinfo =\'logo与左边的距离\',tips=\'\'',
  17 => 'pos =\'1\',no_order=\'9\',type=\'2\',style=\'0\',selectd=\'\',name =\'Column4\',value=\'推荐产品\',defaultvalue=\'推荐产品\',valueinfo =\'首页页面文字\',tips=\'\'',
  18 => 'pos =\'1\',no_order=\'10\',type=\'2\',style=\'0\',selectd=\'\',name =\'Column7\',value=\'友情链接\',defaultvalue=\'友情链接\',valueinfo =\'首页页面文字\',tips=\'\'',
  19 => 'pos =\'1\',no_order=\'11\',type=\'2\',style=\'0\',selectd=\'\',name =\'Newsno\',value=\'10\',defaultvalue=\'10\',valueinfo =\'滚动信息列表显示条数\',tips=\'\'',
  20 => 'pos =\'1\',no_order=\'12\',type=\'2\',style=\'0\',selectd=\'\',name =\'YouPosition\',value=\'您现在的位置\',defaultvalue=\'您现在的位置\',valueinfo =\'招聘页面文字\',tips=\'\'',
  21 => 'pos =\'1\',no_order=\'13\',type=\'2\',style=\'0\',selectd=\'\',name =\'cv\',value=\'投递简历\',defaultvalue=\'投递简历\',valueinfo =\'招聘页面文字\',tips=\'\'',
  22 => 'pos =\'1\',no_order=\'14\',type=\'2\',style=\'0\',selectd=\'\',name =\'more\',value=\'更多\',defaultvalue=\'更多\',valueinfo =\'页面文字\',tips=\'\'',
);
$no='metv2';
$devices='0';
		$re['sql'] = $sql;
		$re['no'] = $no;
		$re['devices'] = $devices;
		return $re;
	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>