
<div id="content" style="height: auto;">
    <div id="content-left">
      <?php

if(isset($_GET["xem"])) {
$xem=$_GET["xem"];
switch ($xem) {
	case 'trangchu':
			include 'index.php';
			break;
	case 'baiviet':
			include("module/left/chi-tiet-tin.php");
			break;
	case 'loaitin':
			include("module/left/chi-tiet-loai-tin.php");
			break;
	case 'dangnhap':
			include("module/left/dangnhap.php");
			break;
	case 'dangky':
			include("module/left/dangky.php");
			break;
	case 'search':
	if(isset($_GET["tukhoa"])) {
			include 'module/left/search_news.php';
			break;
	}else{
		echo "không tìm thấy loại tin nào";
	}
	}
} else {
	include("module/left/tinmoi.php");
	include("module/left/box-tin.php");
}
	  ?>
    </div>
    <div id="content-right" style="height: auto;">
		<?php
        include("module/right/tin-cap-nhat.php");
        ?>
    </div>
    <div class="xoa"></div>
    <div style="width: 100%; padding-top: 10px;">
    	<?php
    	if(isset($_GET["xem"])) {
			$xem=$_GET["xem"];
			switch ($xem) {
				case 'trangchu':
				include 'index.php';
				break; 
			}
		}else{
				include('module/chung/left_right.php');
			}
    		
    	 ?>
    </div>
  </div>