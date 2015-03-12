<?php
// .-----------------------------------------------------------------------------------
// | WE TRY THE BEST WAY
// |-----------------------------------------------------------------------------------
// | Author: 贝贝 <hebiduhebi@163.com>
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved.
// |-----------------------------------------------------------------------------------
require_once("config.php");
require_once(ROOT_PATH.'/server/wxsdk/jssdk.php');
$jssdk = new JSSDK(APPID, APPSECRET,ROOT_PATH.'/server/json/');
$url = $_GET['url'];
$signPackage = $jssdk->GetSignPackage($url);
$jsapilist = "'chooseImage','previewImage','uploadImage','downloadImage','showMenuItems','showAllNonBaseMenuItem','hideAllNonBaseMenuItem','hideOptionMenu','showOptionMenu','hideMenuItems','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo'";






$config = "wx.config({
			    debug: false, 
			    appId: '".$signPackage["appId"]."', 
			    timestamp: '".$signPackage["timestamp"]."', 
			    nonceStr: '".$signPackage["nonceStr"]."', 
			    signature: '".$signPackage["signature"]."',
			    jsApiList: [".$jsapilist."]
			});";

echo $config;
