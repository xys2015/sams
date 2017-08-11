<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>学生信息管理</title>
</head>
<body>
    <?php require('menu.php'); ?>
    <h3>学生信息</h3>
    <?php
        require("list.php");
        showPageList(); // 调用分页显示函数
    ?>
</body>
</html>