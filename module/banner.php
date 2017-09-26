
<div id="banner">
<div class="banner_top">
	<ul class="ul_top">
		<li class="li_top"><a href="index.php?xem=dangky" style="text-decoration: none;">Đăng ký</a></li>
		<?php
		if(isset($_POST["username"]) || isset($_POST["password"]))
		{
			echo '<li class="li_top"><a href="index.php?xem=dangnhap" style="text-decoration: none;">Đăng nhập</a></li>';
		} else {
			echo '<li class="li_top">Xin chào <?php echo @$_SESSION["account"]["name"] ?> | <a href="index.php?xem=dangnhap">Logout</a></li>';
		}
		?>
		
		<li class="li_top">
			<form action="index.php" method="get" name="search_form" class="validator">
			<input type="hidden" name=xem value=search >
			<input  type="text" name="tukhoa" size="15" placeholder="Nhập từ khóa tìm kiếm" id="inputString" class="inputSearch"> <a href="index.php?xem=search">
			 <input type="submit"  value="Tìm" class="buttonSearch"></a>
			</form>
		</li>
	</ul>
</div>
<div style="height: auto;"><img src="temp/image/banner.jpg" width="100%" height="172"/></div>
</div>
<div class="xoa"></div>
