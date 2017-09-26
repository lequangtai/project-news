
<?php
$error = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) or empty($password)){
		$error = 'Vui lòng nhập đầy đủ thông tin';
	}else{
		if (strlen($username) < 3 or strlen($username) > 50) {
			$error = 'Tài khoản phải từ 4 đến 50 ý tự';
		}

		if (strlen($password) <3 or strlen($password) > 50) {
			$error = 'Mật khẩu phải từ 4 đến 50 ký tự';
		}
	}

	if (!isset($error)) {
		// check username
		$stmt = $conn->prepare('SELECT name, password FROM account WHERE name = :name');
		$stmt->bindValue(':name', $username);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if (!$user) {
			$error = "Tài khoản không tồn tại";
		} else {
			//check password password_verify
			if (md5($password, $user['password'])) {
				$_SESSION['account']['name'] = $user['name'];
				redirect('index.php');;
			}else{
				$error = 'Sai mật khẩu';
			}
		}
	}
}
?>
<div id="dangnhap" style="padding-top: 100px; padding-left: 150px">
<!-- <div><img src="image/img-sp-khuyenmai-sl.jpg" width="100%" height="220px" style="margin-bottom:10px"/></div> -->
<div id="dn_left">
<div class="tieude3" style="width:97%;padding-bottom: 40px; padding-left: 100px">ĐĂNG NHẬP THÀNH VIÊN</div>

<?php error_msg ($error) ?>
<form method="post" action="">
<table id="tbdangnhap" width="347" border="0">
  <tbody>
    <tr>
      <td width="100" class="tk">tên tài khoản :</td>
      <td width="242" class="tk"><input type="text" name="username" class="tendn" value="" width="300px" /></td>
      </tr>
    <tr>
      <td class="tk">mật khẩu :</td>
      <td class="tk"><input type="password" name="password" class="tendn" value=""/></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="quenmk"><a href="#">quên mật khẩu</a></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="ghinho"><input type="checkbox" class="gntk" name="chkghinho" value=""/>ghi nhớ tài khoản</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td class="dangnhap"><input type="submit" name="submitname" value="đăng nhập"/></td>
      </tr>
  </tbody>
</table></form>

<!--end-left-->
</div>


</div>
