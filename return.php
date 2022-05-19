<!--下架或是還書-->
<?php
session_start();
$name = $_SESSION['name'];
$book_name = $_GET['book'];
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "sa");
$sql = "select * from book_info where book_user = '$name' and book_name = '$book_name'";
$rs = mysqli_query($link, $sql);
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>下架或是還書</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <header id="header">
                    <h2>我來還書了</h2>
                    <h3 align='right'><br><br>馬上還書評論書籍！</h3>

                </header>
                <section id="banner">
                    <div class="content">
                        <form action="borr.php?br=r" method="POST">
                            <?php if ($book_info = mysqli_fetch_row($rs)) { ?>
                                <header>
                                    <h1>書名 : <?php echo $book_name; ?><br></h1><input hidden name="book_name" value="<?php echo $book_name; ?>" />
                                    <h4>作者 : <?php echo $book_info[3]; ?></h4><input hidden name="book_author" value="<?php echo $book_info[3]; ?>" />
                                    <h4>擁有者 : <?php echo $book_info[0]; ?></h4><input hidden name="book_owner" value="<?php echo $book_info[0]; ?>" />
                                    <h4>借閱者 : <?php echo $book_info[1]; ?></h4><input hidden name="book_user" value="<?php echo $book_info[1]; ?>" />
                                </header>
                                <!--還書日期-->
                                <div class="col-4 col-12-xsmall">
                                    <h4>還書日期 : <input hidden type="date" name="public-date" id="public-date" value="<?php echo date("Y/m/d"); ?>" />
                                        <?php echo date("Y/m/d"); ?></h4>
                                </div>
                                <!--書籍介紹-->
                                <p>介紹文 : <?php echo $book_info[8]; ?></p>
                                <!-- 破損 -->
                                <div class="col-6">
                                    破損頁面&nbsp&nbsp&nbsp<input type="file" name="book-image" id="book-image" accept=".jpg, .png, .img, .jpeg" value=" " />
                                </div>
                                <br>
                                <!--破損詳細-->
                                <div class="col-6 col-12-xsmall">
                                    <input type="text" name="book-name" id="book-name" value="" placeholder="請詳細說明破損的頁數及其狀況" />
                                </div><br>
                                <!--書籍評論-->
                                <div class="col-8">
                                    <textarea name="book-introduction" id="book-introduction" placeholder="簡單介紹一下書吧！" rows="6"></textarea>
                                </div>
                                <br>
                                <div class="col-12">
                                    <ul class="actions">
                                        <li><input type="submit" value="還書" class="primary" /></li>
                                        <li><input type="reset" value="重新填寫" /></li>
                                    </ul>
                                </div>
                        </form>
                    </div>
                    <span class="image object">
                        <img src="images/<?php echo $book_info[7]; ?>" alt="">
                    </span>
                <?php } ?>
                </section>
            </div>
        </div>
        <?php include "index_bar.html" ?>
    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>