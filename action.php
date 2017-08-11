<?php
require("connect.php");
switch($_GET['action']) {
    case "add":
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $classid = $_POST['classid'];

        $sql = "INSERT INTO stu VALUES 
               (null, '$name', '$sex', '$age', '$classid')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('添加成功');
                  window.location='index.php';</script>";
        } else {
            echo "<script>alert('添加失败');
                  window.history.back();</script>";
        }
        mysqli_close($conn);
    break;

    case "del":
        $id = $_GET['id'];
        $sql = "DELETE FROM stu WHERE id = $id";    
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location:index.php");
    break;

    case "edit":
        require('connect.php');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sex = $_POST['sex'];
        $age = $_POST['age'];
        $classid = $_POST['classid'];

        $sql = "UPDATE stu SET name='$name', sex='$sex', age='$age', classid='$classid' WHERE id=$id";
        $result = mysqli_query($conn, $sql);
    
        if($result) {
            echo "<script>alert('修改成功');";
            header("Location:index.php");
        } else {
            echo "<script>alert('修改失败');window.history.back();</script>";
        }
    break;

    case "search":
        require('connect.php');
        $search = $_POST['search'];
        $sql = "SELECT * FROM stu WHERE name='$search' OR sex='$search' OR classid='$search'";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if ($rows) {
            header("Location:index.php?sql=$sql");
        } else {
            echo "<script>alert('没有找到结果！请尝试重新输入搜索内容。');
                  window.history.back();</script>";
        }
    break;
}