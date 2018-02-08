<?php
global $met_skin,$met_skin_url;
// 模板url
$met_skin=$met_skin_user;
$met_skin_url="templates/{$met_skin}/";

require_once template('static/library');// UI资源配置
$metuipack->setUiVersion();// 模板版本信息更新
?>