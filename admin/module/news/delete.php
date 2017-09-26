<?php
if(isset($_GET["nid"])){
	$id=$_GET["nid"];
	news_delete($conn,$id);
}else{
	redirect("index.php?p=danh-sach-tin-tuc");
}
?>