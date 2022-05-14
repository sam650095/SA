<?php 
session_start();

$name = $_SESSION['name'];
$link = mysqli_connect("localhost", "root", "12345678");
mysqli_select_db($link, "sa");

$book_name = $_GET['book'];
    $sql="UPDATE `book_info` SET `book_user`='$name' WHERE book_name = '$book_name'";
    if(mysqli_query($link,$sql))
		{
			header('location:index.php');
		}
?>