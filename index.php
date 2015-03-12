<?php 
	define("IN_CJBM",true);
	
	require_once ("config.php");
	require_once ("functions.php");
	
	
	
?>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>测评</title>
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
		<link rel="stylesheet" href="Public/cdn/amazeui/2.2.1/css/amazeui.min.css" />
		<link rel="stylesheet" href="Public/Test/css/index.css?v=<?php echo VERSION ; ?>" />

		<script src="Public/cdn/jquery/1.11.0/jquery.min.js"></script>
	</head>

	<body>
		<div class="am-container">
			<!--<div class="header-info">
				<p class="am-kai">
					
					<i class="am-icon-mortar-board am-icon-md"></i>
					虽然说，人无完人，但是相较之下还是有优劣之分的。作为一个父母，你们够完美了吗？如果想知道答案，那么就花几分钟时间，做做以下测试吧！
				</p>
			</div>-->
			<ul class="am-avg-sm-2 am-avg-md-2 am-avg-lg-2 boxes">
				<li class="box  box-1">
					<div class="test-item" data-id="1">
						<a href="problem.php?id=1">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
						</a>
					</div>
				</li>
				<li class="box box-2">
					<div class="test-item" data-id="2">
						<a href="problem.php?id=1">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
						</a>
					</div>
				</li>
				<li class="box box-3">
					<div class="test-item">
						<a href="problem.php?id=1">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
						</a>
					</div>
				</li>
				<li class="box box-4">
					<div class="test-item">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
					</div>
				</li>
				<li class="box box-5">
					<div class="test-item">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
					</div>
				</li>
				<li class="box box-6">
					<div class="test-item">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
					</div>
				</li>
				<li class="box box-7">
					<div class="test-item">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
					</div>
				</li>
				<li class="box box-8">
					<div class="test-item">
						<i class="am-icon-heart am-icon-lg"></i>
						<span class="am-text-sm">好爸妈自测 你能得几分？</span>
					</div>
				</li>
			</ul>
		</div>
		
		
		<script type="text/javascript">
			$(function(){
				
			})
			
		</script>
	</body>

</html>