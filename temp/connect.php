<?php
try{
	$conn=new PDO(
		"mysql:host=".DBHOST.";dbname=".DBNAME,
		DBUSER,
		DBPASS,
		array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAME 'utf8'")
	);
$conn->setAttribute(PDO::ATTR_ERRMORE,PDO::ERRMORE_EXCEPTION);

}catch(PDOException $e){
	echo "Lỗi :".$e->getMessage();
	die();
}

?>
