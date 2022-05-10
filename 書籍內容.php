<!DOCTYPE HTML>

<html>

<?php
session_start();
$name = $_SESSION['name'];
$book_name = $_GET['book'];
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "sa");

$sql = "select * from book_info where book_name = '$book_name'";
$rs = mysqli_query($link, $sql);

?>

<head>
    <title>書籍共享平台-書籍上架</title>
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
                    <a href="index.html" class="logo"><strong>書籍資訊</strong></a>

                </header>

                <!-- Content -->

                <section id="banner">
                    <div class="content">
                        <?php if ($book_info = mysqli_fetch_row($rs)) { ?>
                            <header>
                                <h1>書名 : <?php echo $book_name; ?><br></h1>
                                <h4>作者 : <?php echo $book_info[3]; ?></h4>
                                <h4>擁有者 : <?php echo $book_info[0]; ?></h4>
                                <h4>借閱者 : <?php echo $book_info[1]; ?></h4>
                            </header>

                            <p>介紹文 : <?php echo $book_info[8]; ?></p>
                            <ul class="actions">
                                <li><?php if ($book_info[0] == $name) { ?><a href="借閱.php" class="button big">下架</a>
                                    <?php } else { ?><a href="借閱.php?book=<?php echo $book_info[2] ?>" class="button big">借閱</a><?php } ?>
                                </li>
                            </ul>

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