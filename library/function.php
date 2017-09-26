<?php
function redirect($url){
	header("location:$url");
	exit();
}

function error_msg($error){
	if($error!=null){
	echo '<div class="error_msg">'.$error.'</div>';
	}
}

function get_extension($img){
	$post=strrpos($img, ".");
	$ext=substr($img, $post+1);
	$ext=strtolower($ext);
	return $ext;

}

function change_image_name($img){
	$name=str_replace(" ", "_", $img);
	$name=strtolower($name);
	$name=time()."_".$name;
	return $name;
}

function settime($time){
	$time=gmdate("H:i:s - d/m/Y",$time+3600*(7+date("I")));
	echo $time;
}
?>