<?php
/*
    filename: list.php
    下面的函数都是和stu表格绑定的
*/


// 根据SQL语句，显示查询结果
function showLists($sql) {
	require("connect.php");

	$result = mysqli_query($conn, $sql);

	if ($result && mysqli_num_rows($result)) {
		echo '<table width="800" border="1">';
		echo '<tr> 
                <th>ID</th> 
                <th>姓名</th> 
                <th>性别</th> 
				<th>年龄</th> 
                <th>班级</th> 
                <th>操作1</th>
                <th>操作2</th></tr>';

		while ($row = mysqli_fetch_assoc($result)) {
			$id = $row['id'];
			$name = $row['name'];
			$sex = $row['sex'];
			$age = $row['age'];
            $classid = $row['classid'];

            if($sex == 'm') {
                $sex = '女生';
            } else {
                $sex = '男生';
            }
			
			echo '<tr>';
			echo "<td>$id</td>";
			echo "<td>$name</td>";
			echo "<td>$sex</td>";
			echo "<td>$age</td>";
			echo "<td>$classid</td>";
			echo "<td><a href='action.php?action=del&id={$id}'>删除</a></td>";
			echo "<td><a href='edit.php?id={$id}'>修改</a></td>";
			echo '</tr>';
		}
		
		echo '</table>';
	} else {
		echo '查询数据库失败！';
	}

	mysqli_close($conn);
}

// 得到数据总数
function getTotalRecords($tablename = "stu") {
	require("connect.php");

	$sql = "SELECT COUNT(id) AS c FROM $tablename";
	$result = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($result);
	$count = $data['c'];

	mysqli_close($conn);
	return $count;
}

/*
	函数功能：以分页的方式显示用户数据列表
	参数说明：$page_item, 每页显示的记录。 默认每页显示5项。
		     $tablename, 要分页显示的表名称。默认是user表。
*/
function showPageList($page_item = 10, $tablename = "stu") {
	$page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // 当前页
	$total = ceil(getTotalRecords() / $page_item); // 得到总页数
	if ($page <= 1) $page = 1;
	if ($page >= $total) $page = $total;

	$offset = ($page - 1) * $page_item;
	$sql = " SELECT id, name, sex, age, classid 
			 FROM $tablename ORDER BY id DESC LIMIT $offset, $page_item ";

	showLists($sql);

	echo "<a href='index.php?page=1'>首页</a> | ";
	echo "<a href='index.php?page=" . ($page - 1) . "'>上一页</a> | ";
	echo "<a href='index.php?page=" . ($page + 1) . "'>下一页</a> | ";
	echo "<a href='index.php?page={$total}'>尾页</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "[ $page / $total ]";
}
