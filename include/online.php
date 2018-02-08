<?php
# MetInfo Enterprise Content Management System
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.
$met_oline=1;
require_once 'common.inc.php';
if($met_online_type<>3){
	$met_url   = $_M['url']['site'].'public/';
	$cache_online = met_cache('online_'.$lang.'.inc.php');
	if(!$cache_online){$cache_online=cache_online();}
	foreach($cache_online as $key=>$list){
		$online_list[]=$list;
		if($list['qq']!="")$qq_list[]=$list;
		if($list['msn']!="")$msn_list[]=$list;
		if($list['taobao']!="")$taobao_list[]=$list;
		if($list['alibaba']!="")$alibaba_list[]=$list;
		if($list['skype']!="")$skype_list[]=$list;
	}
	$query="select * from {$_M[table][language]} where name='Online' and lang='{$_M['lang']}'";
	$online=$db->get_one($query);
	$lang_Online=$online['value'];
	$metinfo='<div id="onlinebox" class="onlinebox" style="display:none;" m-type="online" m-id="online">';
	$metinfo.='<div class="onlinebox-open" id="onlinebox-open" style="background:'.$_M['config'][met_online_color].';"><i class="fa fa-comments-o"></i></div>';
	$metinfo.='<div class="onlinebox-top editable-click" '.$stit.' style="background:'.$_M['config'][met_online_color].';" met-id="'.$online['id'].'" met-table="language" met-field="value">';
	$metinfo.=$lang_Online.'<a href="javascript:;"  class="onlinebox-close" title="'.$lang_Close.'" onclick="return onlineclose();">x</a><a href="javascript:;" class="onlinebox-min" onclick="return onlinemin();">-</a>';
	$metinfo.='		</div>';
	$metinfo.='		<div class="onlinebox-center">';
	$metinfo.='		<div class="onlinebox-center-box list-group">';
	//online content
	foreach($online_list as $key=>$val){
		$metinfo.='<li class="list-group-item">';
		if(!$met_onlinenameok)$metinfo.='<h4 class="list-group-item-heading">'.$val[name]."</h4>";
		if($val[qq]!=""){
			$metinfo.='<p class="met_qq list-group-item-text"><a href="http://wpa.qq.com/msgrd?v=3&uin='.$val[qq].'&site=qq&menu=yes" target="_blank"><i class="fa fa-qq"></i><span>'.
			$val[qq].'</span></a></p>';
		}
		if($val[msn]!="")$metinfo.='<p class="met_facebook list-group-item-text"><a href="https://www.facebook.com/'.$val[msn].'" target="_blank"><i class="fa fa-facebook"></i><span>'.
			$val[msn].'</span></a></p>';
		if($val[taobao]!="")$metinfo.='<p class="met_taobao list-group-item-text"><a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid='.urlencode($val[taobao]).'&siteid=cntaobao&status='.$met_taobao_type.'&charset=utf-8"><img src="'.
			$met_url.'images/taobao/taobao.png'.
			'" alt=""><span>'
			.$val[taobao].'</span></a></p>';
		if($val[alibaba]!=""){
			$metinfo.='<p class="met_alibaba list-group-item-text"><a target="_blank" href="http://amos.alicdn.com/msg.aw?v=2&uid='.$val[alibaba].'&site=cnalichn&s='.$met_alibaba_type.'&charset=UTF-8"><img src="'.
			$met_url.'images/taobao/taobao.png'.'" alt=""><span>'
			.$val[alibaba].'</span></a></p>';
		}
		if($val[skype]!=""){
			$metinfo.='<p class="met_skype list-group-item-text"><a href="callto://'.$val[skype].'"><i class="fa fa-skype"></i><span>'.$val[skype].'</span></a></p>';}
		$metinfo.="</li>";
	}
	//online over
	$metinfo.='			</div>';
	$metinfo.='		</div>';
	if($met_onlinetel!=""){
	$metinfo.='		<div class="onlinebox-bottom">';
	$metinfo.='			<div class="onlinebox-bottom-box"><div class="online-tbox list-group-item">';
	$metinfo.=$met_onlinetel;
	$metinfo.='			</div></div>';
	$metinfo.='		</div>';
	}
	$metinfo.='</div>';
	if($metinfover == 'v1') $metinfo.='<script>
		function onlinemin(){
			$("#onlinebox").addClass("min");
			return false;
		}
		$(document).on("click",".onlinebox-open",function(){
            $("#onlinebox").removeClass("min");
        })
		$(function() {
            var online_url = "'.$_M['url']['site'].'include/online.php?lang='.$_M['lang'].'";
            $.ajax({
                type: "POST",
                url: online_url,
                dataType: "json",
                success: function(msg) {
                	setTimeout(function(){
                		if(document.documentElement.clientWidth<768) $("#onlinebox").addClass("min");
                        if(msg.t==0 || msg.t==1) document.getElementById("onlinebox-open").style.float = "left";
                	},500)
                }
            })
        });
		</script>';

	$tmpincfile=ROOTPATH."templates/{$_M[config][met_skin_user]}/metinfo.inc.php";
	if(file_exists($tmpincfile)){
		require_once $tmpincfile;
	}
	$metinfover = $metinfover_url ? $metinfover_url : $metinfover;
	if($metinfover == 'v1' || $metinfover == 'v2'){// 增加$metinfover判断值（新模板框架v2）
		//处理回传数据(sea.js处理方式)
		$onlinex=$met_online_type<2?$met_onlineleft_left:$met_onlineright_right;
		$onliney=$met_online_type<2?$met_onlineleft_top:$met_onlineright_top;
		$data['html']=$metinfo;
		$data['t']=$met_online_type;
		$data['x']=$onlinex;
		$data['y']=$onliney;
		echo json_encode($data);
	}else{
		//处理回传数据(老模板处理方式)
		$_REQUEST['jsoncallback'] = strip_tags($_REQUEST['jsoncallback']);
		if($_REQUEST['jsoncallback']){
			$metinfo=str_replace("'","\'",$metinfo);
			$metinfo=str_replace('"','\"',$metinfo);
			$metinfo=preg_replace("'([\r\n])[\s]+'", "", $metinfo);
			echo $_REQUEST['jsoncallback'].'({"metcms":"'.$metinfo.'"})';
		}else{
			echo $metinfo;
		}
		die();
	}

}
# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>