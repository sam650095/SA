<p>輸入您的信箱以查詢密碼</p>
	<input type="text" name="email">
	<input type="submit" value="尋找">
	<br>
	<?php
		if(!empty($_GET["email"]))	echo $_GET["email"];
	?>

<?php
	$row = "select * from user where mail = '".$_POST["email"]."'"[0];
	if(!empty($row["password"])) $email = "您的密碼為：".$row["password"];
	else
	break;
?>