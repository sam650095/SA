<?php
$name = $_POST['name'];
$birth = $_POST['birth'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$account = $_POST['account'];
$password = $_POST['password'];
$email = $_POST['email'];

$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "sa");

$sql = "select * from account where account = '$account'";
$rs = mysqli_query($link, $sql);
if (mysqli_fetch_assoc($rs)) {
    header("location:register.php?register=exist");
} else {
    $add = "INSERT INTO `account`(`name`, `email`, `birth`, `address`, `gender`, `account`, `password`) VALUES ('$name','$email','$birth','$address','$gender','$account','$password')";
    if (mysqli_query($link, $add)) {
        header('location:login.php?method=message&message=新增成功');
    } else {
        header('location:register.php?method=message&message=新增失敗');
    }
}
?>