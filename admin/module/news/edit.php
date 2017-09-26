<?php
if(!isset($_GET["nid"])){
	redirect("index.php?p=danh-sach-tin-tuc");
}else{
$error=null;
$id=$_GET["nid"];
$data_news=news_edit_data($conn,$id);
if(isset($_POST["btnNewsEdit"])){
	if($_POST["sltCate"]=="none"){
		$error='Vui lòng chọn danh mục';
	}elseif (empty($_POST["txtTitle"])) {
		$error='Vui lòng nhập tiêu đề tin';
	}elseif (empty($_POST["txtAuthor"])) {
		$error='Vui lòng nhập tên tác giả';
	}elseif (empty($_POST["txtIntro"])) {
		$error='Vui lòng nhập trích dẫn';
	}elseif (empty($_POST["txtFull"])) {
		$error='Vui lòng nhập nội dung tin';
	}
	else{
		$data=array(
			'id'     =>$id,
			'cate'   =>$_POST["sltCate"],
			'title'  =>$_POST["txtTitle"],
			'author' =>$_POST["txtAuthor"],
			'intro'  =>$_POST["txtIntro"],
			'full'   =>$_POST["txtFull"],
			'image'  =>change_image_name($_FILES["newsImg"]["name"]),
			'public' =>$_POST["rdoPublic"],
			'time'   =>time()
			);

		if (empty($_FILES["newsImg"]["name"])) {
			news_edit_no_image($conn,$data,$error);
		}else{
			if(!in_array(get_extension($_FILES["newsImg"]["name"]), $fileext)){
				$error="File này không được cho phép!";
			}else{
				news_edit_image($conn,$data,$error,$_FILES["newsImg"]["tmp_name"]);
			}

		}
		//news_edit($conn,$data,$error,&$error,$_FILES["newsImg"]["tmp_name"]);
	}
}
?>

<?php
error_msg($error);
?>
<form action="" method="POST" enctype="multipart/form-data" style="width: 650px;">
			<fieldset>
				<legend>Thông Tin Bản Tin</legend>
				<span class="form_label">Tên danh mục:</span>
				<span class="form_item">
					<select name="sltCate" class="select">
						<option value="none">Chọn danh mục</option>
							<?php
								news_cate_data($conn,$data_news["category_id"]);
							?>
					</select>
				</span><br />
				<span class="form_label">Tiêu đề tin:</span>
				<span class="form_item">
					<input type="text" name="txtTitle" class="textbox" 
					<?php
					if(isset($_POST["txtTitle"])){
						echo 'value="'.$_POST["txtTitle"].'"';
					}else{
						echo 'value="'.$data_news["title"].'"';
					}
					?> />
				</span><br />
				<span class="form_label">Tác gỉả:</span>
				<span class="form_item">
					<input type="text" name="txtAuthor" class="textbox"
						<?php
						if(isset($_POST["txtAuthor"])){
							echo 'value="'.$_POST["txtAuthor"].'"';
						}else{
						echo 'value="'.$data_news["author"].'"';
					}
						?>
					/>
				</span><br />
				<span class="form_label">Trích dẫn:</span>
				<span class="form_item">
					<textarea name="txtIntro" rows="5" class="textbox">
						<?php
						if(isset($_POST["txtIntro"])){
							echo $_POST["txtIntro"];
						}else{
						echo $data_news["intro"];
					}
						?> 
					</textarea>

					<script type="text/javascript">
						var editor = CKEDITOR.replace('txtIntro',{
							language:'vi',
							filebrowserImageBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Flash',
							filebrowserImageUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</span><br />
				<span class="form_label">Nội dung tin:</span>
				<span class="form_item">
					<textarea name="txtFull" rows="8" class="textbox">
						<?php
						if(isset($_POST["txtFull"])){
							echo $_POST["txtFull"];
						}else{
						echo $data_news["content"];
					}
						?>
					</textarea>

					<script type="text/javascript">
						var editor = CKEDITOR.replace('txtFull',{
							language:'vi',
							filebrowserImageBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl : '../library/ckfinder/ckfinder.html?Type=Flash',
							filebrowserImageUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl : '../library/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>
				</span><br />
				<span class="form_label">Hình đại diện:</span>
				<span class="form_item">
					<img src="../image/<?php echo $data_news["image"] ?>" width="100px"/>
				</span><br />
				<span class="form_label">Hình đại diện:</span>
				<span class="form_item">
					<input type="file" name="newsImg" class="textbox" />
				</span><br />
				<span class="form_label">Công bố tin:</span>
				<span class="form_item">
					<input type="radio" name="rdoPublic" value="1"
					<?php
					if($data_news["status"]=="1"){
						echo "checked";
					}
					 ?>
					
					/> Có 
					<input type="radio" name="rdoPublic" value="0"
					<?php
					if($data_news["status"]=="0"){
						echo "checked";
					}
					 ?>
					 /> Không
				</span><br />
				<span class="form_label"></span>
				<span class="form_item">
					<input type="submit" name="btnNewsEdit" value="Sửa tin" class="button" />
				</span>
			</fieldset>
		</form>
		<?php } ?>