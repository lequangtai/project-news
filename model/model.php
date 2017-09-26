<?php
function menu_list($conn){
	$stmt=$conn->prepare("SELECT * FROM category ORDER BY id DESC");
	$stmt->execute();
	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function timkiem($conn,$key) {
	$sql = "SELECT * FROM news WHERE title LIKE '%$key%'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function dangky ($conn,$data,&$error) {
	$stmt_check = $conn->prepare("SELECT * FROM account WHERE name = :name OR email = :email OR phone=:phone ");
	$stmt_check->bindParam(":name",$data["tenkhachhang"],PDO::PARAM_STR);
	$stmt_check->bindParam(":email",$data["email"],PDO::PARAM_STR);
	$stmt_check->bindParam(":phone",$data["dienthoai"],PDO::PARAM_INT);
	$stmt_check->execute();
	$count = $stmt_check->rowCount();
	if ($count == 0) {
	$stmt_info = $conn->prepare("insert into account(name,phone,address,email,password) VALUES (:name,:phone,:address,:email,:password)");
	$stmt_info->bindParam(":name",$data["hoten"],PDO::PARAM_STR);
	$stmt_info->bindParam(":phone",$data["dienthoai"],PDO::PARAM_INT);
	$stmt_info->bindParam(":address",$data["diachi"],PDO::PARAM_STR);
	$stmt_info->bindParam(":email",$data["email"],PDO::PARAM_STR);
  $stmt_info->bindParam(":password",$data["matkhau"],PDO::PARAM_STR);
	$stmt_info->execute();
	redirect('index.php?xem=dangnhap');

	} else {
		$error = "Tài khoản này tồn tại rồi";

	}
}

function dangnhap ($conn,$data,&$error) {
	$stmt = $conn->prepare("SELECT * FROM account WHERE name = :name AND password = :password");
	$stmt->bindParam(":name",$data["name"],PDO::PARAM_STR);
	$stmt->bindParam(":password",$data["password"],PDO::PARAM_STR);
	$stmt->execute();
	$row = $stmt->rowCount();
	if ($row != 0) {
		$data = $stmt->fetch(PDO::FETCH_ASSOC);
		$_SESSION["kU2L_id"] = $data["id"];
		$_SESSION["kU2L_user"] = $data["user"];
		$_SESSION["kU2L_level"] = $data["level"];
		redirect();
	} else {
		$error = "Tài khoản không tồn tại";
	}
}


?>