
<?php
$error=null;
if(isset($_GET["tukhoa"])) {
	$key=$_GET["tukhoa"];
	$data=timkiem($conn,$key);
}else {
  echo 'không tìm thấy sản phẩm nào !';
}
?>

<div class="box">
<div class="box-right" style="width:auto">
 <?php
      foreach ($data as $val) {
 ?>
      <div class="box-tin">
      <img src="image/<?php echo $val["image"]; ?>" height="70px"; width="50px"/>
      <p><a href="index.php?xem=baiviet&id=<?php echo $val["id"] ?>"><?php echo $val["title"] ?></a></p>
      <p><?php echo $val["intro"] ?></p>
      <div class="xoa"></div>
      </div> 
<?php } ?>
</div> 
</div>
<div class="xoa"></div>