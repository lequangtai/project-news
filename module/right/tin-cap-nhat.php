<div class="box no-padding no-border">
<div class="tieudebox">THÔNG TIN</div>
<div class="box-right" style="width:auto">
<?php
$data=$db->query("select * from news ORDER BY id desc limit 0,15");
foreach ($data as $val) {
?>
      <div class="box-tin">
      <img src="image/<?php echo $val["image"]; ?>" height="73px"; width="50px" />
      <a href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>" style="text-decoration: none;"><p><?php echo $val["title"]; ?></p></a>
      <div class="xoa"></div>
      </div> 
<?php } ?>
      </div>  
</div>