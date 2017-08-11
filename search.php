<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>学生信息管理</title>
</head>
<body>
    <?php require('menu.php'); ?>
    <h3>查找学生信息</h3>
    <p>请输入要查找的内容</p>
    <p>支持按姓名、性别和班级查找</p>
    <form action="action.php?action=search" method="post">
        <input type="text" name="search">
        <input type="submit" value="查找">
    </form>
</body>
</html>