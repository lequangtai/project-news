<?php
if(isset($_GET["cid"])){
	$id=$_GET["cid"];
	cate_delete($conn,$id);
}else{
	redirect("index.php?p=danh-sach-danh-muc");
}
?>