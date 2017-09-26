<?php
session_start();
if(!$_SESSION["tv_level"] || $_SESSION["tv_level"]!=1){
	header("location:login.php");
	exit();
}
include '../config.php';
include '../library/connect.php';
include 'model/model.php';
include '../library/function.php';
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="temp/templates/css/style.css" />
    <script type="text/javascript" src="../library/ckeditor/ckeditor.js"></script>
	<title>Admin Area :: Trang chính</title>
	<script type="text/javascript">
		function acceptDelete(msg){
			if(window.confirm(msg)){
				return true;
			}
			return false;
		}
	</script>
</head>

<body>
<div id="layout">
    <div id="top">
        Admin Area :: Trang chính
    </div>
	<div id="menu">
		<table width="100%">
			<tr>
				<td>
					<a href="index.php">Trang chính</a> | <a href="">Quản lý user</a> | <a href="">Quản lý danh mục</a> | <a href="">Quản lý tin</a> | <a href="index.php?p=taikhoan">Quản lý tài khoản</a>
				</td>
				<td align="right">
					Xin chào <?php echo $_SESSION["tv_user"]; ?> | <a href="logout.php">Logout</a>
				</td>
			</tr>
		</table>
	</div>
    <div id="main">
		<?php
		if (isset($_GET["p"])) {
			$p=$_GET["p"];
			switch ($p) {
				case 'trang-chu':
					include 'module/dashboad/index.php';
					break;
				case 'them-danh-muc':
					include 'module/cate/add.php';
					break;
				case 'sua-danh-muc':
					include 'module/cate/edit.php';
					break;
				case 'xoa-danh-muc':
					include 'module/cate/delete.php';
					break;
				case 'danh-sach-danh-muc':
					include 'module/cate/list.php';
					break;
				case 'them-tin-tuc':
					include 'module/news/add.php';
					break;
				case 'sua-tin-tuc':
					include 'module/news/edit.php';
					break;
				case 'xoa-tin-tuc':
					include 'module/news/delete.php';
					break;
				case 'danh-sach-tin-tuc':
					include 'module/news/list.php';
					break;
				case 'them-thanh-vien':
					include 'module/user/add.php';
					break;
				case 'sua-thanh-vien':
					include 'module/user/edit.php';
					break;
				case 'xoa-thanh-vien':
					include 'module/user/delete.php';
					break;
				case 'danh-sach-thanh-vien':
					include 'module/user/list.php';
					break;
				case 'taikhoan':
					include 'module/account/account.php';
					break;
				
				
				default:
					include 'module/dashboad/index.php';
					break;
			}
		}else {
			include 'module/dashboad/index.php';
		}
		?>
	</div>
    <div id="bottom">
        Copyright © 2016 by QuocTuan.Info & QHOnline.Edu.Vn 
    </div>
</div>
</body>
</html>