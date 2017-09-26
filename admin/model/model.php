<?php
function cate_add($conn,$data,&$error){
	$check=$conn->prepare("SELECT name FROM category WHERE name=:name");
	$check->bindParam(':name',$data["name"],PDO::PARAM_STR);
	$check->execute();
	$count=$check->rowCount();
	if($count==0)
	{
		$stmt=$conn->prepare("INSERT INTO category(name) VALUES(:name)");
	$stmt->bindParam(':name',$data["name"],PDO::PARAM_STR);
	$stmt->execute();
	redirect("index.php?p=danh-sach-danh-muc");
	}else
	{
		$error= 'Có dữ liệu rồi';
	}
}

function cate_list($conn){
	$stmt=$conn->prepare("SELECT * FROM category ORDER BY id DESC");
	$stmt->execute();
	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function cate_edit($conn,$data){
	$stmt=$conn->prepare("UPDATE category SET name=:name WHERE id=:id");
	$stmt->bindParam(':name',$data["name"],PDO::PARAM_STR);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt->execute();
	redirect("index.php?p=danh-sach-danh-muc");
}

function cate_edit_data($conn,$id){
	$stmt=$conn->prepare("SELECT * FROM category WHERE id=:id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

function cate_delete($conn,$id){
	$stmt=$conn->prepare("DELETE FROM category WHERE id=:id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	redirect("index.php?p=danh-sach-danh-muc");
}

function news_cate_data($conn,$selected){
	$stmt=$conn->prepare("SELECT *FROM category");
	$stmt->execute();
	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($data as $val) {
		if($selected==$val["id"]){
			echo '<option value="'.$val["id"].'" selected>'.$val["name"].'</option>';
		}else{
			echo '<option value="'.$val["id"].'">'.$val["name"].'</option>';
		}
	}
}

function news_add($conn,$data,&$error,$tmp_file){
	$check=$conn->prepare("SELECT title from news WHERE title=:title");
	$check->bindParam('title',$data["title"],PDO::PARAM_STR);
	$check->execute();
	$count=$check->rowCount();
	if($count==0){
		$stmt=$conn->prepare("INSERT INTO news(title,author,intro,content,image,status,category_id,time_news) VALUES(:title,:author,:intro,:content,:image,:status,:category_id,:time_news)");
	$stmt->bindParam(':title',$data["title"],PDO::PARAM_STR);
	$stmt->bindParam(':author',$data["author"],PDO::PARAM_STR);
	$stmt->bindParam(':intro',$data["intro"],PDO::PARAM_STR);
	$stmt->bindParam(':content',$data["full"],PDO::PARAM_STR);
	$stmt->bindParam(':image',$data["image"],PDO::PARAM_STR);
	$stmt->bindParam(':status',$data["public"],PDO::PARAM_INT);
	$stmt->bindParam(':category_id',$data["cate"],PDO::PARAM_INT);
	$stmt->bindParam(':time_news',$data["time"],PDO::PARAM_INT);
	$stmt->execute();
	move_uploaded_file($tmp_file, '../image/'.$data["image"]);
	redirect("index.php?p=danh-sach-tin-tuc");
	}else{
		$error='Dữ liệu này đã tồn tại rồi';
	}
}

function news_list($conn){
	$stmt=$conn->prepare("SELECT * FROM news ORDER BY id DESC");
	$stmt->execute();
	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function news_edit($conn,$data,&$error,$tmp_file){
	$stmt=$conn->prepare("UPDATE news SET title=:title,author=:author,intro=:intro,content=:content,image=:image,status=:status,category_id=:category_id,time_news=:time_news WHERE id=:id");
	$stmt->bindParam(':title',$data["title"],PDO::PARAM_STR);
	$stmt->bindParam(':author',$data["author"],PDO::PARAM_STR);
	$stmt->bindParam(':intro',$data["intro"],PDO::PARAM_STR);
	$stmt->bindParam(':content',$data["full"],PDO::PARAM_STR);
	$stmt->bindParam(':image',$data["image"],PDO::PARAM_STR);
	$stmt->bindParam(':status',$data["public"],PDO::PARAM_INT);
	$stmt->bindParam(':category_id',$data["cate"],PDO::PARAM_INT);
	$stmt->bindParam(':time_news',$data["time"],PDO::PARAM_INT);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt->execute();
	move_uploaded_file($tmp_file, '../image/'.$data["image"]);
	redirect("index.php?p=danh-sach-tin-tuc");
}

function news_edit_no_image($conn,$data,&$error){
	$stmt=$conn->prepare("UPDATE news SET title=:title,author=:author,intro=:intro,content=:content,image=:image,status=:status,category_id=:category_id,time_news=:time_news WHERE id=:id");
	$stmt->bindParam(':title',$data["title"],PDO::PARAM_STR);
	$stmt->bindParam(':author',$data["author"],PDO::PARAM_STR);
	$stmt->bindParam(':intro',$data["intro"],PDO::PARAM_STR);
	$stmt->bindParam(':content',$data["full"],PDO::PARAM_STR);
	$stmt->bindParam(':image',$data["image"],PDO::PARAM_STR);
	$stmt->bindParam(':status',$data["public"],PDO::PARAM_INT);
	$stmt->bindParam(':category_id',$data["cate"],PDO::PARAM_INT);
	$stmt->bindParam(':time_news',$data["time"],PDO::PARAM_INT);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt->execute();
	redirect("index.php?p=danh-sach-tin-tuc");
}

function news_edit_image($conn,$data,&$error,$tmp_file){
	$stmt_name_image=$conn->prepare("SELECT image FROM news WHERE id=:id");
	$stmt_name_image->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt_name_image->execute();
	$data=$stmt_name_image->fetch(PDO::FETCH_ASSOC);
	if(file_exists("../image/".$data["image"])){
		unlink("../image/".$data["image"]);
	}

	$stmt=$conn->prepare("UPDATE news SET title=:title,author=:author,intro=:intro,content=:content,image=:image,status=:status,category_id=:category_id,time_news=:time_news WHERE id=:id");
	$stmt->bindParam(':title',$data["title"],PDO::PARAM_STR);
	$stmt->bindParam(':author',$data["author"],PDO::PARAM_STR);
	$stmt->bindParam(':intro',$data["intro"],PDO::PARAM_STR);
	$stmt->bindParam(':content',$data["full"],PDO::PARAM_STR);
	$stmt->bindParam(':image',$data["image"],PDO::PARAM_STR);
	$stmt->bindParam(':status',$data["public"],PDO::PARAM_INT);
	$stmt->bindParam(':category_id',$data["cate"],PDO::PARAM_INT);
	$stmt->bindParam(':time_news',$data["time"],PDO::PARAM_INT);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt->execute();
	move_uploaded_file($tmp_file, '../image/'.$data["image"]);
	redirect("index.php?p=danh-sach-tin-tuc");
}

function news_edit_data($conn,$id){
	$stmt=$conn->prepare("SELECT * FROM news WHERE id=:id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

function news_delete($conn,$id){
	$stmt_name_image=$conn->prepare("SELECT image FROM news WHERE id=:id");
	$stmt_name_image->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt_name_image->execute();
	$data=$stmt_name_image->fetch(PDO::FETCH_ASSOC);
	if(file_exists("../image/".$data["image"])){
		unlink("../image/".$data["image"]);
	}
	$stmt=$conn->prepare("DELETE FROM news WHERE id=:id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	redirect("index.php?p=danh-sach-tin-tuc");
}

function user_add($conn,$data,&$error){
	$check=$conn->prepare("SELECT user FROM user WHERE user=:user");
	$check->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$check->execute();
	$count=$check->rowCount();
	if($count==0)
	{
		$stmt=$conn->prepare("INSERT INTO user(user,pass,level) VALUES(:user,:pass,:level)");
	$stmt->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$stmt->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$stmt->bindParam(':level',$data["level"],PDO::PARAM_INT);
	$stmt->execute();
	redirect("index.php?p=danh-sach-thanh-vien");
	}else
	{
		$error= 'Có dữ liệu rồi.Vui lòng nhập user khác';
	}
}

function login($conn,$data,&$error){
	$check=$conn->prepare("SELECT * FROM user WHERE user=:user AND pass=:pass");
	$check->bindParam(':user',$data["user"],PDO::PARAM_STR);
	$check->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$check->execute();
	$count=$check->rowCount();
	if($count==0){
		$error="Tài khoản không tồn tại";

	}else{
		$data_login=$check->fetch(PDO::FETCH_ASSOC);
		$_SESSION["tv_id"]=$data_login["id"];
		$_SESSION["tv_user"]=$data_login["user"];
		$_SESSION["tv_level"]=$data_login["level"];
		header("location:index.php");
		exit();
	}
}

function user_list($conn){
	$stmt=$conn->prepare("SELECT * FROM user ORDER BY id DESC");
	$stmt->execute();
	$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}

function user_edit_data($conn,$id){
	$stmt=$conn->prepare("SELECT * FROM user WHERE id=:id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

function user_edit($conn,$data){
	$stmt=$conn->prepare("UPDATE user SET pass=:pass,level=:level WHERE id=:id");
	$stmt->bindParam(':pass',$data["pass"],PDO::PARAM_STR);
	$stmt->bindParam(':level',$data["level"],PDO::PARAM_INT);
	$stmt->bindParam(':id',$data["id"],PDO::PARAM_INT);
	$stmt->execute();
	redirect("index.php?p=danh-sach-thanh-vien");
}

function user_delete($conn,$id){
	$stmt=$conn->prepare("DELETE FROM user WHERE id=:id");
	$stmt->bindParam(':id',$id,PDO::PARAM_INT);
	$stmt->execute();
	redirect("index.php?p=danh-sach-thanh-vien");
}

function thongke($conn,$table){
	$stmt=$conn->prepare("SELECT count(*) as tong FROM $table ");
	$stmt->execute();
	$data=$stmt->fetch(PDO::FETCH_ASSOC);
	return $data;
}

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

function customer_list ($conn) {
	$stmt = $conn->prepare("SELECT * FROM account ORDER BY id DESC");
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;
}
?>