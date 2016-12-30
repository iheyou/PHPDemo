<?php 
	$connect = mysqli_connect("127.0.0.1","root","root");
	if (!$connect) {
		echo "服务器连接失败！";
	}

	mysqli_select_db($connect, "taoyunzhushou_question");

	function insert() {
		$sql_insert = "INSERT INTO taoyunzhushou_qa (qa_title, qa_content) VALUES ('')"

		if ($db) {
			
		}
	}

	
 ?>