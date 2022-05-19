<!--借書或還書-->
<?php
session_start();

$name = $_SESSION['name'];
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "sa");
if ($_GET['br'] == "r") {
	$book_name = $_POST['book_name'];
	$book_user = $_POST['book_user'];
	$book_owner = $_POST['book_owner'];
	$sql = "UPDATE `book_info` SET `book_user`='none' WHERE book_name = '$book_name' and book_owner = '$book_owner'";
	if (mysqli_query($link, $sql)) {
		header("location:index.php?log = r_success");
	}
} else {
	$book_name = $_GET['book'];
	$sql = "UPDATE `book_info` SET `book_user`='$name' WHERE book_name = '$book_name'";
	if (mysqli_query($link, $sql)) {
		header('location:index.php');
	}
}
?>