<div class="box no-padding no-border" style="margin-top:10px;border:1px solid #DCDCDC;">
<div class="tieudebox">TIN THỂ THAO</div>
      <div class="box-left">
      <?php
      $data=$db->query("select * from news where category_id='2' ORDER BY id desc limit 1");
      foreach ($data as $val) {
      ?>
      <img src="image/<?php echo $val["image"]; ?>">
      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p class="tieude"><?php echo $val["title"]; ?></p></a>
      <p class="tomtat"><?php echo $val["intro"]; ?></p>
      <?php } ?>
      </div>
      <div class="box-right">
      <?php
      $data=$db->query("select * from news where category_id='2'");
      foreach ($data as $val) {
      ?>
      <div class="box-tin">
      <img src="image/<?php echo $val["image"]; ?>" width="50px"; height="70px"/>
      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p><?php echo $val["title"]; ?></p></a>
      <div class="xoa"></div>
      </div> 
      <?php } ?>
      
      </div>
      <div class="xoa"></div>
  </div>

<div class="box no-padding no-border" style="margin-top:10px;border:1px solid #DCDCDC;">
<div class="tieudebox">TIN PHÁP LUẬT</div>
      <div class="box-left">
      <?php
      $data=$db->query("select * from news where category_id='6' ORDER BY id desc limit 1");
      foreach ($data as $val) {
      ?>
      <img src="image/<?php echo $val["image"]; ?>">
      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p class="tieude"><?php echo $val["title"]; ?></p></a>
      <p class="tomtat"><?php echo $val["intro"]; ?></p>
      <?php } ?>
      </div>
      <div class="box-right">
      <?php
      $data=$db->query("select * from news where category_id='6'");
      foreach ($data as $val) {
      ?>
      <div class="box-tin">
      <img src="image/<?php echo $val["image"]; ?>" width="50px"; height="70px"/>
      <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><p><?php echo $val["title"]; ?></p></a>
      <div class="xoa"></div>
      </div> 
      <?php } ?>
         </div>
      <div class="xoa"></div>
   
      </div>


