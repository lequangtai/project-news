<div id="dangky">
<!-- <div><img src="image/img-sp-khuyenmai-sl.jpg" width="100%" height="220px" style="margin-bottom:10px"/></div> -->
<div id="dn_left">
<div class="tieude3" style="width:97%;padding-top:50px; padding-left:250px">ĐĂNG KÝ THÀNH VIÊN</div>
<?php
$error = null;
if (isset($_POST["dangky"])) {

	if (empty($_POST["txthoten"])) {
		$error = "Vui lòng nhập họ tên";
	}else if (empty($_POST["txtdienthoai"])) {
		$error = "Vui lòng nhập điện thoại";
	}else if (empty($_POST["txtdiachi"])) {
		$error = "Vui lòng nhập địa chỉ";
	}else if (empty($_POST["txtemail"])) {
		$error = "Vui lòng nhập email";
	}else if (empty($_POST["txtmatkhau"])) {
		$error = "Vui lòng nhập mật khẩu";
	} else {
		$data = array(
				'hoten'	=> $_POST["txthoten"],
				'dienthoai'	=> $_POST["txtdienthoai"],
				'diachi'	=> $_POST["txtdiachi"],
				'email'	=> $_POST["txtemail"],
				'matkhau'=>md5($_POST["txtmatkhau"])
			);
		dangky ($conn,$data,$error);


	}
}
?>

<?php error_msg ($error) ?>
<form action="" method="post" enctype="multipart/form-data" style="padding-top: 50px; padding-left: 100px">
<table width="357" border="0" id="tbdangky">
  <tbody>
    <tr>
      <td width="163">họ và tên :*</td>
      <td width="17">&nbsp;</td>
      <td width="155"><input type="text" name="txthoten" class="txthoten" value=""/></td>
    </tr>
    <tr>
      <td>điện thoại :</td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtdienthoai" class="txthoten" value=""/></td>
    </tr>
    <tr>
      <td>địa chỉ :*</td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtdiachi" class="txthoten" value=""/></td>
    </tr>
    <tr>
      <td>email :*</td>
      <td>&nbsp;</td>
      <td><input type="text" name="txtemail" class="txthoten" value=""/></td>
    </tr>
    <tr>
      <td>mật khẩu :*</td>
      <td>&nbsp;</td>
      <td><input type="password" name="txtmatkhau" class="txthoten" value=""/></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="dangky" id="sbmdangky" value="đăng ký"/></td>
    </tr>
  </tbody>
</table></form>


<!--end-left-->
</div>

</div>
