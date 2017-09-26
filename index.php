<?php
ob_start();
session_start();
include 'config.php';
$db = new Db();
include 'library/connect.php';
include 'library/function.php';
include 'model/model.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>đồ án</title>
<link href="temp/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
 <?php
	 
	  include("module/banner.php");
	  include("module/menu.php");
	  include("module/content.php");
	  include("module/footer.php");
 ?>
</div>

<script type="text/javascript">
function hide_float_right() {
    var content = document.getElementById('float_content_right');
    var hide = document.getElementById('hide_float_right');
    if (content.style.display == "none")
    {content.style.display = "block"; hide.innerHTML = '<a href="javascript:hide_float_right()">Tắt Quảng Cáo [X]</a>'; }
        else { content.style.display = "none"; hide.innerHTML = '<a href="javascript:hide_float_right()">Xem Quảng Cáo</a>';
    }
    }
</script>
<style>
.float-ck { position: fixed; bottom: 0px; z-index: 9000}
* html .float-ck {position:absolute;bottom:auto;top:expression(eval (document.documentElement.scrollTop+document.docum entElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0))) ;}
#float_content_right {border: 1px solid #01AEF0;}
#hide_float_right {text-align:right; font-size: 11px;}
#hide_float_right a {background: #01AEF0; padding: 2px 4px; color: #FFF;}
</style>
<div class="float-ck" style="right: 20px;bottom: 30px" >
<div id="hide_float_right">
<a href="javascript:hide_float_right()">Tắt Quảng Cáo [X]</a></div>
<div id="float_content_right">
 
<a href="http://www.stu.edu.vn/" target="_blank"><img src="http://www.stu.edu.vn/uploads/news/79f83ab3b918f2990626873fd1f7784d.png" title="138 Asia Casino" width="300px" height="220px" /></a>
 </div>
 </div>
</body>
</html>