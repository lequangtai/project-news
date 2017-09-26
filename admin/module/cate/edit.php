<?php 
$error=null;
if(isset($_GET["cid"])){
	$id=$_GET["cid"];
	if(isset($_POST["btnCateEdit"])){
		if(empty($_POST["txtCateName"])){
			$error='Vui lòng nhập tên danh mục';
		}else {
			$data=array(
				'id'  =>$id,
				'name'=>$_POST["txtCateName"]
				);
			cate_edit($conn,$data);
		}
	}
	$data=cate_edit_data($conn,$id);
 ?>

 <?php
error_msg($error);
?>
<form action="" method="POST" style="width: 650px;">
			<fieldset>
				<legend>Thông Tin Danh Mục</legend>
				<span class="form_label">Tên danh mục:</span>
				<span class="form_item">
					<input type="text" name="txtCateName" class="textbox" value="<?php echo $data["name"]; ?>" />
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnCateEdit" value="Sửa danh mục" class="button" />
				</span>
			</fieldset>
		</form> 
<?php
}else {
	redirect("index.php?p=danh-sach-danh-muc");
}
?> 