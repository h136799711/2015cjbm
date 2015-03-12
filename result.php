<?php 
// .----------------------------------------------------------------------------------- 
// | WE TRY THE BEST WAY // |----------------------------------------------------------------------------------- 
// | Author: 贝贝 <hebiduhebi@163.com> 
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved. 
// |----------------------------------------------------------------------------------- 

define("IN_CJBM",true);
	
require_once ("config.php"); 
require_once ("functions.php"); 

if(!isset($_POST['testid']) || !isset($_POST['totalscore'])){
	
	echo "参数错误！";
	exit();
}

$id = $_POST['testid'];
if(empty($id)){
	echo "参数错误！";
	exit();
//	header("location: http://www.baidu.com");
	
}
$score = $_POST['totalscore'];

$test = require("server/data/result_$id.data.php"); 


$results = $test['results'];


$result = null;
foreach($results as $key=>$vo){
	$eval =  str_replace("{score}",$score, $vo['condition_eval']);
//	var_dump($eval);
	$boolean = eval("return ".$eval);
	if($boolean === true){
		$result = $vo;
		break;
	}
}

if($result === null){
	
	echo "测评出现错误！";
	exit();
}

$userwxid = getWxuserID();

?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>
			<?php echo $test[ 'title']; ?>
		</title>
		<!-- Set render engine for 360 browser -->
		<meta name="renderer" content="webkit">

		<!-- No Baidu Siteapp-->
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<link rel="icon" type="image/png" href="Public/cdn/amazeui/2.2.1/i/favicon.png">

		<!-- Add to homescreen for Chrome on Android -->
		<meta name="mobile-web-app-capable" content="yes">
		<link rel="icon" sizes="192x192" href="Public/cdn/amazeui/2.2.1/i/app-icon72x72@2x.png">

		<!-- Add to homescreen for Safari on iOS -->
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta name="apple-mobile-web-app-title" content="Amaze UI" />
		<link rel="apple-touch-icon-precomposed" href="Public/cdn/amazeui/2.2.1/i/app-icon72x72@2x.png">

		<!-- Tile icon for Win8 (144x144 + tile color) -->
		<meta name="msapplication-TileImage" content="Public/cdn/amazeui/2.2.1/i/app-icon72x72@2x.png">
		<meta name="msapplication-TileColor" content="#0e90d2">
		<!--<link type="text/css" rel="stylesheet" href="Public/cdn/amazeui/2.2.1/css/amazeui.min.css" />-->
		<link type="text/css" rel="stylesheet" href="Public/cdn/amazeui/2.2.1/css/amazeui.flat.min.css" />
		<link type="text/css" rel="stylesheet" href="Public/Test/css/index.css?v=<?php echo VERSION ; ?>" />

		<script src="Public/cdn/jquery/1.11.0/jquery.min.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>		
		 <script type="text/javascript">
		 	var url = "./server/wxconfig.php?url="+location.href.split('#')[0];		 
			document.write('<script src="'+url+'"><\/script>');
		 </script>
		
	</head>

	<body>
		<div class="am-g result-page">
			<div class="title am-text-center am-sm-text-center am-md-text-center am-lg-text-center">
				<?php echo $test[ 'title']; ?>
			</div>
			<div class="result">
				<p class="am-text-center">
					您的得分为：<span class="score"><?php echo $score; ?></span>
				</p>
			</div>
			
			<div class="description">
				<p>
					<?php echo $result['description']; ?>
				</p>
			</div>
			<div class="am-u-xs-12 am-u-sm-12">
				<a href="problem.php?id=<?php echo $id; ?>" class="am-btn am-btn-primary am-btn-block am-align-right">重新测试</a>
			</div>
		</div>
		<div>&nbsp;</div>
		<div>&nbsp;</div>
		
		<div class="am-modal am-modal-no-btn" tabindex="-1" id="alert">
		  <div class="am-modal-dialog">
		    <div class="am-modal-hd">系统消息
		      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
		    </div>
		    <div class="am-modal-bd  am-text-danger">
		      
		    </div>
		  </div>
		</div>
		<!-- 微信分享内容-->
		<input type="hidden" id="wxshareTitle" value="我得了<?php echo $score; ?>分，赶紧来测试吧！" />
		<input type="hidden" id="wxshareLink" value="<?php echo SITE_URL; ?>/problem.php?id=<?php echo $id; ?>" />
		<input type="hidden" id="wxshareImgUrl" value="<?php echo SITE_URL; ?>/Public/Test/share.png" />
		<input type="hidden" id="wxshareDesc" value="<?php echo $result['description']; ?>" />
		
		<script src="Public/cdn/amazeui/2.2.1/js/amazeui.min.js" />
		<script src="Public/Test/js/index.js"></script>
		<script type="text/javascript">
			
			window.globalParams = {
				curProblemIndex:0,
				totalProblems:$(".problem-item").length
			};
			
			function showAlert(text,delayHide){
				$("#alert .am-modal-bd").text(text);
				$("#alert").modal("open");
				setTimeout(function(){$("#alert").modal("close");},delayHide);
			}
			
		
			
			
		</script>
		
	</body>

</html>