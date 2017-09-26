<?php
// try{
// 	$conn=new PDO(
// 		"mysql:host=".DBHOST.";dbname=".DBNAME,
// 		DBUSER,
// 		DBPASS,
// 		array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES='utf8'")
// 	);
// $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// }catch(PDOException $e){
// 	echo "Lỗi :".$e->getMessage();
// 	die();
// }


class Db {
	var $conn =null;
function __construct()
	{
		try {
			$this->conn = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME,
						DBUSER,
						DBPASS,
						//array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES='utf8'")
			);
		} catch (PDOException $e) {
			echo "Lỗi : " . $e->getMessage();
			die();
		}

	}

function query($sql)
{
	$stmt = $this->conn->prepare($sql);
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $data;

}

}

?>
