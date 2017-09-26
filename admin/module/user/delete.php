<?php
if(!isset($_GET["uid"])){
	header("location:index.php?p=danh-sach-thanh-vien");
	exit();
}else{
	$id=$_GET["uid"];
	$data=user_edit_data($conn,$id);
	if($id==1 || ($_SESSION["tv_id"]!=1 && $data["level"]==1)){
		echo "<script type='text/javascript'>
			alert('Bạn không được phép xóa thành viên này!');
			window.location.href='index.php?p=danh-sach-thanh-vien';	
		</script>";
		exit();
	}else{
		user_delete($conn,$id);
	}
}
?>