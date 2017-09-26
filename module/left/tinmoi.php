<div class="box">
      <div class="box-left">
       <?php
     $data=$db->query("select * from news ORDER BY id desc limit 1");
      foreach ($data as $val) {
      ?>
      <img src="image/<?php echo $val["image"]; ?>" width="300px"; height="250px">
      <p class="tieude">
      <a href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><?php echo $val["title"]; ?></a></p>
      <p class="tomtat"><?php echo $val["intro"]; ?></p>
      <?php } ?>
      </div>
      <div class="box-right">
      <ul>
      <?php 
      $data=$db->query("select * from news ORDER BY id desc limit 0,12");
      foreach ($data as $val) {
       ?>
             <a style="text-decoration: none;" href="index.php?xem=baiviet&id=<?php echo $val["id"]; ?>"><li><?php echo $val["title"]; ?></li></a>
      <?php } ?>
      </ul>        
      
      </div>
      <div class="xoa"></div>
      </div>