
<div id="menu" style="text-decoration:none">
     <ul class="ul_menu">
          <li class="li_menu"><a href="index.php">trang chủ</a></li>
          <?php
          $val=null;
          //$data = $db->query("select * from category where id = '".$val['id']."'");
          $data = $db->query("select * from category");
          foreach ($data as $val) {
          ?>
          <li class="li_menu"><a href="index.php?xem=loaitin&id=<?php echo $val["id"]; ?>"><?php echo $val["name"]; ?></a></li>
          <?php } ?>
         
     </ul>
    <!--  <div class="searchauto" style="width:20%; float:right; padding-top: 5px">
			<form action="index.php" method="get" name="search_form" class="validator">
			<input type="hidden" name=xem value=search >
			<input  type="text" name="tukhoa" size="15" placeholder="Nhập từ khóa tìm kiếm" id="inputString" class="inputSearch"> <a href="index.php?xem=search">
			 <input type="submit"  value="Tìm" class="buttonSearch"></a>
			</form>
			</div> -->
  </div>
  <div class="xoa"></div>