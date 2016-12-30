<?php 

	$item_title = $_POST["item_title"];
	$item_content = $_POST["item_content"];

	echo "标题：".$item_title."<br>";
	echo "内容：".$item_content."<br><br>";

	// $itemArr = array(
	// 	'title' =>"'".$item_title."'" ,
	// 	'content' => "'".$item_content."'"
	// );

	$connect = mysqli_connect("127.0.0.1","root","root");
	if (!$connect) {
		echo "服务器连接失败！<br>";
		return;
	} else {
		echo "服务器连接成功！<br>";
	}

	if ($connect->select_db("taoyunzhushou_question")) {
		echo "打开数据库成功！<br>";
	} else {
		echo "打开数据库失败！<br>";
	}

	$sql_insert = "INSERT INTO taoyunzhushou_qa (qa_title, qa_content) VALUES ('$item_title', '$item_content')";
	if (!$connect->query($sql_insert)) {
		echo "添加item失败！<br>";
	} else {
		echo "添加item成功！<br>";
	}
	
	

	if ($connect->close()) {
		echo "数据库连接关闭!<br>";
	} else {
		echo "数据库连接未能关闭！<br>";
	}

?>
