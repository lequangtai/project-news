<?php
$error=null;
if(isset($_POST["btnCateAdd"])){
	if(empty($_POST["txtCateName"])){
		$error="Vui lòng nhập danh mục";
	}else {
		$data=array(
			'name' => $_POST["txtCateName"],
			);
		cate_add($conn,$data,$error);
	}
}
?>
<?php
error_msg($error);
?>
<form action="" method="POST" style="width: 650px;">
			<fieldset>
				<legend>Thông Tin Danh Mục</legend>
				<span class="form_label">Tên danh mục:</span>
				<span class="form_item">
					<input type="text" name="txtCateName" class="textbox" />
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnCateAdd" value="Thêm danh mục" class="button" />
				</span>
			</fieldset>
		</form>  