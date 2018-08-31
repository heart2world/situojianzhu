<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<!-- Set render engine for 360 browser -->
	<meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

	<link href="/public/simpleboot/themes/<?php echo C('SP_ADMIN_STYLE');?>/theme.min.css" rel="stylesheet">
    <link href="/public/simpleboot/css/simplebootadmin.css" rel="stylesheet">
    <link href="/public/js/artDialog/skins/default.css" rel="stylesheet" />
    <link href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome.min.css"  rel="stylesheet" type="text/css">
    <style>
		form .input-order{margin-bottom: 0px;padding:3px;width:40px;}
		.table-actions{margin-top: 5px; margin-bottom: 5px;padding:0px;}
		.table-list{margin-bottom: 0px;}
		.pointUl>li{position: relative;}
		.pointred{
			position: absolute;
			right: 10px;
			top:-20px;
			color: red;
		    font-size: 60px;
		    position: absolute;
		}
		.form-search select{height: 36px;}
		#messagecontent::-webkit-scrollbar {display:none}
		
</style>
	<!--[if IE 7]>
	<link rel="stylesheet" href="/public/simpleboot/font-awesome/4.4.0/css/font-awesome-ie7.min.css">
	<![endif]-->
	<script type="text/javascript">
	//全局变量
	var GV = {
	    ROOT: "/",
	    WEB_ROOT: "/",
	    JS_ROOT: "public/js/",
	    APP:'<?php echo (MODULE_NAME); ?>'/*当前应用名*/
	};
	</script>
    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/wind.js"></script>
    <script src="/public/simpleboot/bootstrap/js/bootstrap.min.js"></script>
    <script>
    	$(function(){
    		$("[data-toggle='tooltip']").tooltip();
    	});
    </script>
<?php if(APP_DEBUG): ?><style>
		#think_page_trace_open{
			z-index:9999;
		}
	
	</style><?php endif; ?>
</head>
<style>
.row-fluid{
	display:none;position: fixed;  top: 20%;border-radius: 3px;  left: 28%; width: 44%; overflow:hidden; overflow-y: auto;  padding: 8px;  border: 1px solid #E8E9F7;  background-color: white;  z-index:10003;
}
#bg{ display: none;  position: fixed;  top: 0%;  left: 0%;  width: 100%;  height: 100%;  background-color: black;  z-index:1001;  -moz-opacity: 0.7;  opacity:.70;  filter: alpha(opacity=70);}

.table tr th,.table tr td{
	text-align: center;
}
</style>
<body>
	<div class="wrap js-check-wrap">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">效果图方案阶段</a></li>
		</ul>
		<form class="well form-search">
			项目：
			<select id="select">
				<?php if(is_array($project_ids)): foreach($project_ids as $key=>$vo): $selected=$project_id==$vo['id']?"selected":""; ?>
					<option value="<?php echo ($vo["id"]); ?>" <?php echo ($selected); ?>><?php echo ($vo["project_name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</form>
		<ul class="nav nav-tabs pointUl">
			<li><a href="<?php echo U('Effect/index',array('project_id'=>$principal['id']));?>">甲方项目基本信息</a></li>
			<li><a href="<?php echo U('Effect/communication',array('project_id'=>$principal['id']));?>">沟通记录文件<?php if($sign['ggcount'] > 0 ): ?><span class="pointred">.</span><?php endif; ?></a></li>			
			<li><a href="<?php echo U('Effect/project_style',array('project_id'=>$principal['id']));?>">项目风格图片<?php if($sign['fgcount'] > 0 ): ?><span class="pointred">.</span><?php endif; ?></a></li>
			<li><a href="<?php echo U('Effect/effect_plan',array('project_id'=>$principal['id']));?>">效果图方案<?php if($sign['xgcount'] > 0 ): ?><span class="pointred">.</span><?php endif; ?></a>
			<li  class="active"><a href="<?php echo U('Effect/scheme',array('project_id'=>$principal['id']));?>">编制规划方案文本</a>
		</ul>
		<form class="form-horizontal" id="tagforms" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="control-group" style="margin-bottom: 0px;">
				<label class="control-label">项目名称：</label>
				<div class="controls" style="margin-top: 5px;">
					<label><?php echo ($principal["project_name"]); ?></label>
				</div>
			</div>
			<div class="control-group" style="margin-bottom: 0px;">
				<label class="control-label">项目编号：</label>
				<div class="controls" style="margin-top: 5px;">
					<label><?php echo ($principal["project_no"]); ?></label>
				</div>
			</div>
			<div class="control-group" style="margin-bottom: 0px;">
				<label class="control-label" style="margin-left: 70px;">甲方负责人基本信息：</label>
			</div>
			<table class="table table-hover table-bordered" style="width: 900px;margin-left:90px;">
				<thead>
				<tr>
					<th style="text-align: center;">姓名</th>
					<th style="text-align: center;">联系方式</th>
					<th style="text-align: center;">职务</th>
					<th style="text-align: center;">qq号</th>
					<th style="text-align: center;">微信号</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td style="text-align: center;"><?php echo ($principal["principal_name"]); ?></td>
					<td style="text-align: center;"><?php echo ($principal["mobile"]); ?></td>
					<td style="text-align: center;"><?php echo ($principal["duty"]); ?></td>
					<td style="text-align: center;"><?php echo ($principal["qq"]); ?></td>
					<td style="text-align: center;"><?php echo ($principal["wx"]); ?></td>
				</tr>
				</tbody>
			</table>
			<div class="control-group" style="margin-bottom: 0px;">
					<label class="control-label" style="margin-left: 60px;">编制规划方案文本：</label>
			</div>
			<div class="control-group" style="margin-bottom: 0px;">
				<label class="control-label">&nbsp;</label>
				<div class="controls" style="margin-bottom: 5px;">
						<a href="javascript:upload_workingplan3('文件上传','#thumb','file','','','<?php echo ($project_id); ?>',5,'Effect/scheme')">
							<span class="btn" style="margin-left: -88px;background:#1abc9c">上传至乙方负责人</span>
						</a>
						<span style="margin-left: 20px;color:#ccc">注：需乙方负责人审核，上传编制规划方案文本（满足当地规划部门审查的文本或电子档）</span>
				</div>
			</div>
			<table class="table table-hover table-bordered" style="width: 900px;margin-left:90px;">
				<thead>
					<tr>
						<th style="text-align: center;min-width: 80px;">上传时间</th>						
						<th style="text-align: center;min-width: 120px;">文件名</th>
						<th style="text-align: center;min-width: 80px;">上传人姓名</th>
						<th style="text-align: center;min-width: 80px;">乙方负责人确认状态</th>
						<th style="text-align: center;min-width: 80px;">相关部门审核状态</th>
						<th style="text-align: center;">操作</th>
					</tr>
				</thead>
				<tbody id="messagelist">
					<?php if(is_array($files)): $i = 0; $__LIST__ = $files;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>						
						<td style="text-align: center;"><?php echo (date('Y-m-d H:i',$val["create_time"])); ?></td>
						<td style="text-align: center;"><?php echo ($val["file_name"]); ?></td>
						<td style="text-align: center;"><?php echo ($val["user_name"]); ?></td>
						<td style="text-align: center;">
								<?php if($val['status'] == 0): ?><span>已确认</span><?php endif; ?>
								<?php if($val['status'] == 1): ?><span style="color:red">未处理</span><?php endif; ?>
						</td>
						<td style="text-align: center;">
							<?php if($val['status'] == 0): if($val['audit_status'] == 0): ?><span>审核通过</span><?php endif; ?>
								<?php if($val['audit_status'] == 2): ?><span>审核不通过</span><?php endif; ?>
								<?php if($val['audit_status'] == 1): ?><span style="color:red">未处理</span><?php endif; endif; ?>
						</td>
						<td style="text-align: center;">
							<a href="<?php echo U('Effect/downloadgg',array('id'=>$val['id']));?>" class="btn" style="background:#1abc9c">下载</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					<?php if(count($files) == 0): ?><tr><td id="nonumber" colspan="5" style="text-align: center;">暂无资料信息</td>
					</tr><?php endif; ?>
				</tbody>
			</table>
			<div class="pagination" style="margin-left: 90px;"><?php echo ($page); ?></div>
		</fieldset>
		</form>
	</div>
<script src="/public/js/common.js"></script>
<script src="/public/js/layer/layer.js"></script>
<script type="text/javascript">
    var select = document.getElementById('select');
    select.onchange = function(){
        var val = this.value;
        location.href = '<?php echo U("Effect/index");?>'+'&project_id='+val;
    };

    function close_div() {
        $('.row-fluid').css('display','none');
        $('#bg').css('display','none');
    }
</script>
</body>
</html>