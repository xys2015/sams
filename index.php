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
        $default_sql = "SELECT * FROM stu";
        $receive_sql = isset($_GET['sql']) ? $_GET['sql'] : 0;
        // echo $receive_sql; exit; 
        $sql = "";
        if ($receive_sql) {
            $sql = $receive_sql;
        } else {
            $sql = $default_sql;
        }
        // $sql = "SELECT * FROM stu WHERE name='李白'";
        if (isset($_GET['page'])) {
            showPagelist();
        } else {
            showLists($sql);
        }
        
    ?>
</body>
</html>