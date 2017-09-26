
<div class="box">
<?php
$data=$db->query("select * from news where id='".$_GET["id"]."'");
foreach ($data as $val) {
?>
<!-- <div style="float: left;width: 200px"> -->
<div style="float: left; padding-top: 5px;"><?php settime($val["time_news"]) ?></div></br>
<div style="padding-top: 10px;font-size: 23px"><b><?php echo $val["title"]; ?></b></div>

<div style="padding-top: 10px;"><b><?php echo $val["intro"]; ?></b></div>

<div style="padding-top: 10px;">
<p><?php echo $val["content"]; ?></p>
</div>
<div style="float: right;padding-top: 10px"><b><?php echo $val["author"]; ?></b></div>
<div class="xoa"></div>
</div>
<?php } ?>