<?php
# MetInfo Enterprise Content Management System 
# Copyright (C) MetInfo Co.,Ltd (http://www.metinfo.cn). All rights reserved.

defined('IN_MET') or exit('No permission');

load::sys_class('curl');

class install{
	function dosql(){
		global $_M;	
		$dir = dirname(__FILE__);
		require_once  $dir.'/set.class.php';
		$in = new set();
		$re = $in->dosql();
		$sql = $re['sql'];
		$no = $re['no'];
		$devices = $re['devices'];
		
		$query = "SELECT * FROM {$_M['table']['skin_table']} WHERE skin_name='{$no}'";
		$tem = DB::get_one($query);
		if(!$tem){
			$query = "INSERT INTO {$_M['table']['skin_table']} set skin_name='{$no}',skin_file='{$no}',skin_info='',devices='{$devices}'";
			DB::query($query);
		}

		if(!isset($tem['ver']))
		{
			$query="ALTER TABLE {$_M['table']['skin_table']} ADD COLUMN ver varchar(10) NOT NULL DEFAULT '1.0'";
			DB::query($query);
		}
			

			$post = array('type'=>'tem', 'no'=>$no, 'cmsver'=>$_M['config']['metcms_v'], 'user_key'=>$_M['config']['met_secret_key']);
			$curlHandle = curl_init();
			curl_setopt($curlHandle, CURLOPT_URL, str_replace('https','http',$_M['url']['api']).'n=platform&c=platform&a=doapp_check'); 
			curl_setopt($curlHandle, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
			curl_setopt($curlHandle, CURLOPT_REFERER, $_M['config']['met_weburl']);
			curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1); 
			curl_setopt($curlHandle, CURLOPT_POST, 1);	
			curl_setopt($curlHandle, CURLOPT_POSTFIELDS, $post);
			$result = curl_exec($curlHandle);
			curl_close($curlHandle); 
			$temp = json_decode($result,true);

			if($temp['products']['ver'] > $tem['ver'])
			{
				$ver = $temp['products']['ver'];
			}else{
				$ver = $tem['ver'];
			}
		
		
		// 更新模板版本
		$query = "UPDATE {$_M['table']['skin_table']} SET ver='{$ver}' WHERE skin_name='{$no}'";
		DB::query($query);

		$curl = new curl();
		$curl->set('file', 'index.php?n=platform&c=temcheck&a=doauth');
		$post = array('type'=>'tem', 'no'=>$no, 'cmsver'=>$_M['config']['metcms_v'], 'user_key'=>$_M['config']['met_secret_key']);
		$data = $curl->curl_post($post);
		list($suc, $file, $code, $foot) = explode('|', $data);
		$file = PATH_WEB.'templates/'.$no.'/'.$file;
		if ($suc == 'suc') {
			$str = file_get_contents($file);
			$str = str_replace('$metinfi_auth_code;', $code, $str);
			$str = str_replace('$metinfi_auth_code', $code, $str);
			file_put_contents($file, $str);
		}

		$curl->set('file', 'index.php?n=platform&c=authcheck&a=dois_auth');
		$post = array('type'=>'tem', 'no'=>$no, 'cmsver'=>$_M['config']['metcms_v'], 'user_key'=>$_M['config']['met_secret_key']);
		$data = $curl->curl_post($post);
		$file = PATH_WEB.'templates/'.$no.'/'.'foot.php';
		$str = file_get_contents($file);
		if($data == 'suc'){
			$str = str_replace('$metinfi_auth_footcode;', '', $str);
			$str = str_replace('$metinfi_auth_footcode', '', $str);
		}else{
			$str = str_replace('$metinfi_auth_footcode;', $foot, $str);
			$str = str_replace('$metinfi_auth_footcode', $foot, $str);
		}
		file_put_contents($file, $str);
		$new = array();
		foreach ($sql as $key => $v) {
			$arr1 = explode(',', $v);
			foreach ($arr1 as $key1 => $c) {
				$arr2 = explode('=', $c);
				$new[$key][trim($arr2[0])] = trim($arr2[1],'\'');
			}
		}
	
		foreach ($_M['langlist']['web'] as $lang=>$val) {
			foreach ($new as $key => $data) {
				
				$data['no'] = $no;
				if(!$this->check_config($data, $lang)){
						$this->add_config($data, $lang);
				}else{
					$this->update_config($data, $lang);
				}
			}
			
		}
		return 'complete';	
	}


		/**
	 * 检测单条模板标签配置是否存在
	 * @DateTime 2017-04-10
	 * @param    array  $data 一条配置
	 * @param    string $lang 语言
	 * @return   boolean 
	 */
	public function check_config($data,$lang) {
		global $_M;
		if($data['type'] == 1){
			$where = "type = 1 AND pos = {$data['pos']}";
		}else{
			$where = "name = '{$data['name']}'";
		}
		$query = "SELECT id FROM {$_M['table']['templates']} WHERE {$where} AND valueinfo = '{$data['valueinfo']}' AND no='{$data['no']}' AND lang='{$lang}'";
		return DB::get_one($query);
	}

	/**
	 * 更新一条模板标签配置数据
	 * @DateTime 2017-04-10
	 * @param    array  $data 一条配置
	 * @param    string $lang 语言
	 */
	public function update_config($data,$lang) {
		global $_M;

		if($data['name'] != '' && $data['type'] != 1){
			$query = "UPDATE {$_M['table']['templates']} SET pos = {$data['pos']},style={$data['style']},selectd='{$data['selectd']}',defaultvalue = '{$data['defaultvalue']}',valueinfo = '{$data['valueinfo']}',tips = '{$data['tips']}' WHERE name = '{$data['name']}' AND type = {$data['type']} AND no='{$data['no']}' AND lang='{$lang}'";
		
			return DB::query($query);
		}
		return true;
		
	}

		/**
	 * 插入一条新加的标签配置数据
	 * @DateTime 2017-04-10
	 */
	public function add_config($data,$lang) {
		global $_M;
		$query = "INSERT INTO {$_M['table']['templates']} SET no ='{$data['no']}',lang='{$lang}',pos = {$data['pos']},style={$data['style']},selectd='{$data['selectd']}',defaultvalue = '{$data['defaultvalue']}',valueinfo = '{$data['valueinfo']}',tips = '{$data['tips']}',name = '{$data['name']}',type = {$data['type']},no_order={$data['no_order']}";
		return DB::query($query);
	}
}

# This program is an open source system, commercial use, please consciously to purchase commercial license.
# Copyright (C) MetInfo Co., Ltd. (http://www.metinfo.cn). All rights reserved.
?>