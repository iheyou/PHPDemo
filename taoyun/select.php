<?php 
	$item_id = $_POST['item_id'];
	echo "id:".$item_id."<br>";
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

	$sql_select = " SELECT * FROM taoyunzhushou_qa WHERE qa_id = $item_id ";

	if ($result = $connect->query($sql_select)) {
		echo "查询成功！<br><br>";
		$arr = $result->fetch_all();
		$row = $arr[0];

		echo "标题：".$row[1]."<br>";
		echo "内容：".$row[2]."<br><br>";

		$result->close();
	} else {
		echo "查询失败！<br>";
	}
	
	if ($connect->close()) {
		echo "数据库连接关闭!<br>";
	} else {
		echo "数据库连接未能关闭！<br>";
	}

?>
