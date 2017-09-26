<div style="width: 49.5%; float: left; border: 1px solid #DCDCDC">
    		<div class="tieudebox">TIN THỜI SỰ</div>
    		<div class="box-left" style="padding-top: 10px; height: auto;">
		      <?php
		      $data=$db->query("select * from news where category_id='7' ORDER BY id desc limit 1");
		      foreach ($data as $val) {
		      ?>
		      <img src="image/<?php echo $val["image"]; ?>">
		      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p class="tieude"><?php echo $val["title"]; ?></p></a>
		      <p class="tomtat"><?php echo $val["intro"]; ?></p>
		      <?php } ?>
		      </div>
		      <div class="box-right">
		      <?php
		      $data=$db->query("select * from news where category_id='7'");
		      foreach ($data as $val) {
		      ?>
			      <div class="box-tin">
			      <img src="image/<?php echo $val["image"]; ?>" width="50px"; height="70px"/>
			      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p><?php echo $val["title"]; ?></p></a>
			      <div class="xoa"></div>
		      	  </div>
	      <?php } ?>
	      </div> 
    	</div>
    	 <!-- <div class="xoa"></div> -->
    
    	<div style="width: 49.5%; height: auto; float: right; border: 1px solid #DCDCDC">
    		<div class="tieudebox">TIN DU LỊCH</div>
    		<div class="box-left" style="padding-top: 10px; height: auto;">
			      <?php
			      $data=$db->query("select * from news where category_id='3' ORDER BY id desc limit 1");
			      foreach ($data as $val) {
			      ?>
			      <img src="image/<?php echo $val["image"]; ?>">
			      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p class="tieude"><?php echo $val["title"]; ?></p></a>
			      <p class="tomtat"><?php echo $val["intro"]; ?></p>
			      <?php } ?>
			      </div>
			      <div class="box-right">
			      <?php
			      $data=$db->query("select * from news where category_id='3'");
			      foreach ($data as $val) {
			      ?>
			      <div class="box-tin">
			      <img src="image/<?php echo $val["image"]; ?>" width="50px"; height="70px"/>
			      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p><?php echo $val["title"]; ?></p></a>
			        <div class="xoa"></div>
		      </div> 
		      <?php } ?>
		      </div>
		      </div>
    	</div>

  <div class="xoa"></div>
<div style="width: 49.5%; float: left; border: 1px solid #DCDCDC; margin-top: 10px">
    		<div class="tieudebox">TIN GIÁO DỤC</div>
    		<div class="box-left" style="padding-top: 10px; height: auto;">
		      <?php
		      $data=$db->query("select * from news where category_id='5' ORDER BY id desc limit 1");
		      foreach ($data as $val) {
		      ?>
		      <img src="image/<?php echo $val["image"]; ?>">
		      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p class="tieude"><?php echo $val["title"]; ?></p></a>
		      <p class="tomtat"><?php echo $val["intro"]; ?></p>
		      <?php } ?>
		      </div>
		      <div class="box-right">
		      <?php
		      $data=$db->query("select * from news where category_id='5'");
		      foreach ($data as $val) {
		      ?>
			      <div class="box-tin">
			      <img src="image/<?php echo $val["image"]; ?>" width="50px"; height="70px"/>
			      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p><?php echo $val["title"]; ?></p></a>
			      <div class="xoa"></div>
		      	  </div>
	      <?php } ?>
	      </div> 
    	</div>
    	 <!-- <div class="xoa"></div> -->
    
    	<div style="width: 49.5%; height: auto; float: right; border: 1px solid #DCDCDC; margin-top: 10px">
    		<div class="tieudebox">TIN SỨC KHỎE</div>
    		<div class="box-left" style="padding-top: 10px; height: auto;">
			      <?php
			      $data=$db->query("select * from news where category_id='4' ORDER BY id desc limit 1");
			      foreach ($data as $val) {
			      ?>
			      <img src="image/<?php echo $val["image"]; ?>">
			      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p class="tieude"><?php echo $val["title"]; ?></p></a>
			      <p class="tomtat"><?php echo $val["intro"]; ?></p>
			      <?php } ?>
			      </div>
			      <div class="box-right">
			      <?php
			      $data=$db->query("select * from news where category_id='4'");
			      foreach ($data as $val) {
			      ?>
			      <div class="box-tin">
			      <img src="image/<?php echo $val["image"]; ?>" width="50px"; height="70px"/>
			      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p><?php echo $val["title"]; ?></p></a>
			        <div class="xoa"></div>
		      </div> 
		      <?php } ?>
		      </div>
		      </div>
    	</div>