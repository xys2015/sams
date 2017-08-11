<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>学生信息管理</title>
</head>
<body>
<?php
	require('menu.php');
    require('connect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM stu WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['id'];
        $name = $row['name'];
        $sex = $row['sex'];
        $age = $row['age'];
        $classid = $row['classid'];
    } else {
        die("没有要修改的数据！");
    }
?>
    <h3>修改学生信息</h3>
	<p>你正在修改的是ID为 <strong><?php echo $id ?></strong> 学生的信息。</p>
    <form action="action.php?action=edit" method="post">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <table>
        <tr>
            <td>姓名</td>
            <td><input type="text" name="name" value="<?php echo $name ?>"></td></tr>
        <tr>
            <td>性别</td>
            <td>
                <input type="radio" name="sex" value="m" 
                <?php echo $sex=="m" ? "checked" : "" ?> ><span>男生</span>
                <input type="radio" name="sex" value="f"
                <?php echo $sex=="f" ? "checked" : "" ?> ><span>女生</span>
            </td></tr>
        <tr>
            <td>年龄</td>
            <td><input type="text" name="age" value="<?php echo $age ?>"></td></tr>
        <tr>
            <td>班级</td>
            <td><input type="text" name="classid" value="<?php echo $classid ?>"></td></tr>  
        <tr>
            <td><input type="submit" value="修改"></td>
            <td><input type="reset" value="恢复"></td></tr>
    </table>
</form>
</body>
</html>