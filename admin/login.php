<?php
session_start();
if(isset($_SESSION["tv_level"]) && isset($_SESSION["tv_user"])){
    header("location:index.php");
    exit();
}
include '../config.php';
include '../library/connect.php';
include 'model/model.php';
include '../library/function.php';

$error=null;
if(isset($_POST["btnLogin"])){
    if(empty($_POST["txtUser"])){
         $error="Vui lòng nhập username";
     }elseif (empty($_POST["txtPass"])) {
         $error="Vui lòng nhập Password";
     }elseif (empty($_POST["txtLock"])) {
         $error="Vui lòng nhập khóa cửa";
     }elseif ($_POST["txtLock"]!="quangtai146") {
         $error="Khóa cửa không đúng";
     }else{
        $user=trim(strip_tags($_POST["txtUser"]));
        $pass=md5(md5($_POST["txtPass"]));
            $data=array(
                'user'  =>$user,
                'pass'  =>$pass
            );
        login($conn,$data,$error);
     }
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="QuocTuan.Info" />
    <link rel="stylesheet" href="temp/templates/css/style.css" />
	<title>Admin Area :: Login</title>
</head>
<body>
<div id="layout">
    <div id="top">
        Admin Area :: Login
    </div>
    <div id="main"> 
    <?php
    error_msg($error);
    ?>       
		<form action="" method="POST" style="width: 650px; margin: 30px auto;">
            <fieldset>
                <legend>Thông Tin Đăng Nhập</legend>                
				<table>
                    <tr>
                        <td class="login_img"></td>
                        <td>
                            <span class="form_label">Username:</span>
                            <span class="form_item">
                                <input type="text" name="txtUser" class="textbox" />
                            </span><br />
                            <span class="form_label">Password:</span>
                            <span class="form_item">
                                <input type="password" name="txtPass" class="textbox" />
                            </span><br />
                            <span class="form_label">Khóa cửa:</span>
                            <span class="form_item">
                                <input type="text" name="txtLock" class="textbox" />
                            </span><br />
                            <span class="form_label"></span>
                            <span class="form_item">
                                <input type="submit" name="btnLogin" value="Đăng nhập" class="button" />
                            </span>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </div>
    <div id="bottom">
        Copyright © 2016 by QuocTuan.Info & QHOnline.Edu.Vn 
    </div>
</div>

</body>
</html>