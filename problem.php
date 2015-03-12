<?php 
// .----------------------------------------------------------------------------------- 
// | WE TRY THE BEST WAY // |----------------------------------------------------------------------------------- 
// | Author: 贝贝 <hebiduhebi@163.com> 
// | Copyright (c) 2013-2015, http://www.gooraye.net. All Rights Reserved. 
// |----------------------------------------------------------------------------------- 

define("IN_CJBM",true);

require_once ("config.php"); 
require_once ("functions.php");

if(!isset($_GET['id'])){
	
	echo "参数错误！";
	exit();
}
$id = $_GET['id'];
if(empty($id)){
	echo "参数错误！";
	exit();
//	header("location: http://www.baidu.com");
}

$test = require("server/data/test_$id.data.php"); 
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
		
	</head>

	<body>
		<div class="am-g test-page">
			<div class="title am-text-center am-sm-text-center am-md-text-center am-lg-text-center">
				<?php echo $test[ 'title']; ?>
			</div>
			<div class="description">
				<p class="am-kai">
					<?php echo $test[ 'description']; ?>
				</p>
			</div>
			
			<div class="problems-list">
				<form id="problemsForm" method="post" action="result.php">
					<input type="hidden" class="testid" name="testid" value="<?php echo $test['id']; ?>" />
					<input type="hidden" class="totalscore" name="totalscore" value="-1" />
					
				</form>
				<?php foreach($test[ 'problems'] as $key=>$problem){ ?>
				
				<div class="problem-item <?php if($key == 0){ echo "current"; } ?>">
					<div class="problem-desc am-text-middle">
					<?php echo $key+1; ?>、
					<?php echo $problem[ 'description']; ?>
					</div>
					<div class="answer-list">
						<?php foreach($problem[ 'answer'] as $anskey=>$answer){ ?>
						<div class="answer-item am-text-default">
							<div class="am-radio">
								<label>
									<input type="radio" class="score-<?php echo $key;?>" name="score<?php echo $key;?>" value="<?php echo $answer['score']; ?>">
									<?php echo $answer[ 'key']; ?>.
									<?php echo $answer[ 'desc']; ?>
								</label>
							</div>
						</div>
						<?php } ?>

					</div>
				</div>
				<?php } ?>
			</div>
			<div class="am-btn-group-lg am-g">
				<div class="am-u-xs-6 am-u-sm-6">
					<button id="btnPrev" class="am-btn-block am-btn am-btn-default am-disabled">没有上一题!</button>
				</div>
				<div class="am-u-xs-6 am-u-sm-6">
					<button id="btnSubmit" class="am-btn am-btn-primary am-hide">完成</button>
					<button id="btnNext" class="am-btn-block am-btn am-btn-primary">下一题</button>
				</div>
			</div>
			
		</div>
		
		<div class="am-modal am-modal-no-btn" tabindex="-1" id="alert">
		  <div class="am-modal-dialog">
		    <div class="am-modal-hd">系统消息
		      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
		    </div>
		    <div class="am-modal-bd  am-text-danger">
		      
		    </div>
		  </div>
		</div>
		
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
			
			
			//是否选择答案
			function hasChoosed(){
				var answer = $(".problem-item.current .answer-list input[type='radio']:checked").val();
				if(typeof(answer) == "undefined"){
					return false;	
				}
				return true;
			}
			
			function getPrev(){
				window.globalParams.curProblemIndex--;
				if(window.globalParams.curProblemIndex < -1){
					window.globalParams.curProblemIndex = -1;
				}
				return window.globalParams.curProblemIndex;
			}
			
			function getNext(){
				window.globalParams.curProblemIndex++;
				if(window.globalParams.curProblemIndex > window.globalParams.totalProblems){
					window.globalParams.curProblemIndex = window.globalParams.totalProblems;
				}
				return window.globalParams.curProblemIndex;
			}
			
			
			function bindListener(){
				$("#btnSubmit").click(function(){
					
					if(!hasChoosed()){
						showAlert("请选择答案！",1500);
						return ;
					}
					var testid = $(".testid").val();
					var score = 0;
					$(".answer-item input[type='radio']:checked").each(function(index,item){
						//遍历统计得分
						score += parseInt($(item).val()) ;
					});
					
					console.log(score);
					//发送参数到服务器，请求结果
					$(".totalscore").val(score);
					
					$("#problemsForm").submit();
				});
				$("#btnPrev").click(function(){
					
					
					var curIndex = getPrev();
					if(curIndex == -1){
						return ;
					}
					
					$(".problem-item.current").removeClass('current');
					
					$(".problem-item").eq(curIndex).addClass('current');
					
					if(curIndex == 0){
						$("#btnPrev").text("没有上一题!").addClass("am-disabled");
					}
					
					if(curIndex == window.globalParams.totalProblems-2){
						$("#btnSubmit").addClass("am-hide");
						$("#btnNext").text("下一题").removeClass("am-disabled am-hide");
					}
					
				});
				
				
				$("#btnNext").click(function(){
					
					
					if(!hasChoosed()){
						showAlert("请选择答案！",1500);
						return ;
					}
					
					var curIndex = getNext();
					if(curIndex == window.globalParams.totalProblems){
						return ;
					}
					
//					console.log(curIndex);
					
					$(".problem-item.current").removeClass('current');
					
					$(".problem-item").eq(curIndex).addClass('current');
					
					//点击下一题，展示没有下一题，如果当前点击后是最后一题
					if(curIndex == window.globalParams.totalProblems-1){
						$("#btnNext").text("没有下一题！").addClass("am-disabled am-hide");
						$("#btnSubmit").removeClass("am-hide");
						return ;
					}
					
					//点击下一题，激活上一题，如果当前点击后是第二题
					if(curIndex == 1){
						$("#btnPrev").text("上一题").removeClass("am-disabled");
					}
					
				});
				
				
			}
			
			
			
			
			$(function(){
				
				//TODO:
				//1. 绑定上下题按钮
				bindListener();
				//2. 检测是否选择答案
				//3. 计算得分
				//4. 最后一题时，提交答案
				//
			})
		</script>
	</body>

</html>