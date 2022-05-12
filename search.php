<?php 
    $colname_rs = $_POST["query"];
    $result = explode(" ",$_POST["query"]);
    $link = mysqli_connect("localhost", "root");
    mysqli_select_db($link, "sa");
    $query_rs = "";
    for($i=0;$i<count($result);$i++){
        if($i==0) 
            $query_rs .= "SELECT * FROM book_info WHERE book_name LIKE '$result[0]' ";
        else 
            $query_rs .= " UNION SELECT * FROM book_info WHERE book_name LIKE '$result[$i]' ";
    }

    $query_rs .= " ORDER BY book_name DESC";
    $rs = mysqli_query($link, $query_rs);
    $row_rs = mysqli_fetch_assoc($rs);
    $totalRows_rs = mysqli_num_rows($rs);
?>


<html>
    <body>
        <p align="center"><B>關鍵詞搜索結果如下：
        <?php
            for($i=0;$i<count($result);$i++) { 
            echo $result[$i]." ";}
        ?></B></p>
        
    </body>
</html>
<html>

<head>
    <title>書籍共享平台-搜尋結果</title>
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
                    <a href="index.html" class="logo"><strong>書籍共享平台</strong></a>
                    <ul class="icons">
                        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
                        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                        <li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
                        <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                        <li><a href="#" class="icon brands fa-medium-m"><span class="label">Medium</span></a></li>
                    </ul>
                </header>

                <!-- Content -->
                <section>

                    <!-- Content -->
                    <h2 id="content">搜尋結果</h2>
                    <hr class="major" />
                    
                    <!--搜尋書籍關鍵字結果-->
                    <p align="center"><B>關鍵詞搜索結果如下：
                    <?php
                    for($i=0;$i<count($result);$i++) { 
                    echo $result[$i]." ";}
                    ?></B></p>
                    <p><hr></p>
                    <?php if($totalRows_rs>0) do { ?>
                    <p>* <a href="show.php?key=<?php echo $colname_rs ?>&id=<?php echo
                    $row_rs["id"]; ?>"><?php echo $row_rs["title"]; ?></a>(<?php echo
                    $row_rs["click"]; ?> | <?php echo $row_rs["last_access"]; ?>)</p>
                    <?php } while ($row_rs = mysqli_fetch_assoc($rs)); ?>

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
