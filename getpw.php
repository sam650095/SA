<head>
    <title>找回密碼</title> 
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/register.css" />
</head>


<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Banner -->
                <section id="banner">
                    <span class="box">
                        
                        <div class="items2">
                            <?php
                            $account = $_POST['account'];
                            $email = $_POST['email'];
                            $link = mysqli_connect("localhost", "root");
                            mysqli_select_db($link, "sa");
                            $sql = "select * from account where account = '$account'";
                            $rs = mysqli_query($link, $sql);
                            $row = "select * from account where email = '$email'";
                            if ($user = mysqli_fetch_assoc($rs)) {
                                if ($user['email'] == $email) {
                                    echo "<h2>找回密碼成功！</h2>"."您的密碼為：";
                                    echo $row['password'];
                                }
                                else echo "<h2>沒有此帳號！</h2>";
                            }
                            else echo "<h2>沒有此帳號！</h2>";
                            ?>
                        </div>
                        <a href="login.php" type="submit">登入</a>
                        <a href="forget.php" type="submit">返回</a>
    </div>


</body>
