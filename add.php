<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>学生信息管理</title>
</head>
<body>
    <?php require('menu.php'); ?>
    <h3>添加学生信息</h3>
    <form action="action.php?action=add" method="post">
    <table>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name"></td></tr>
        <tr>
            <td>性别</td>
            <td>
                <input type="radio" name="sex" value="m"><span>男生</span>
                <input type="radio" name="sex" value="f"><span>女生</span>
            </td></tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" name="age"></td></tr>
        <tr>
            <td>班级</td>
            <td><input type="text" name="classid"></td></tr>  
        <tr>
            <td><input type="submit" value="增加"></td>
            <td><input type="reset" value="重置"></td></tr>
    </table>
</form>
</body>
</html>