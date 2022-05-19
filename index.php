<?php
session_start();
$name = $_SESSION['name'];
$link = mysqli_connect("localhost", "root");
mysqli_select_db($link, "sa");
$sql = "select * from book_info";
$rs = mysqli_query($link, $sql);
?>
<!DOCTYPE HTML>

<html>

<head>
    <title>書籍共享平台</title>
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
                    <section id="search" class="alt">
                    <?
                        if ($_SESSION['name'] <> "")
                        {
                    ?>
                        <ul class="icons">
                            <li><a href="logout.php" class="button primary small"><? echo $_SESSION['name']; ?></span></a></li>
                        </ul>
                    <?
                        }
                        else
                        {
                    ?>
                        <ul class="icons">
                            <li><a href="login.php" class="button primary small">登入</span></a></li>
                        </ul>
                    <?
                        }
                    ?>
                        <form method="post" action="search.php">
                            <input type="text" name="query" id="query" placeholder="輸入關鍵字" />
                        </form>
                    </section>

                </header>

                <!-- Banner -->

                <section id="banner">
                    <div class="content">
                        <header>
                            <h1>書籍共享平台</h1>
                            <p>共享經濟</p>
                        </header>
                        <p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam
                            maximus erat id euismod egestas. Pellentesque sapien ac quam. Lorem ipsum dolor sit nullam.</p>
                        <ul class="actions">
                            <li><a href="#" class="button big">Learn More</a></li>
                        </ul>
                    </div>
                    <span class="image object">
                        <img src="images/共享經濟.jpg" alt="" />
                    </span>
                </section>

                <!-- Section  -->
                <section>
                    <header class="major">
                        <h2>本月推薦</h2>
                    </header>
                    <div class="features">
                        
                            <?php
                            $i = 0;
                            while ($rslt =  mysqli_fetch_assoc($rs) and $i < 4) {
                            ?>
                            <article>
                                <span><img src="images/<?php echo $rslt['book_image'];?>" alt="" /></span>
                                <div class="content">
                                    <h3><?php echo $rslt['book_name'];?></h3>
                                    <p><?php echo $rslt['book_introduction'];?></p>
                                    <ul class="actions">
                                        <li><a href="書籍內容.php?book=<?php echo $rslt['book_name'] ?>" class="button">立即借閱</a></li>
                                    </ul>
                                </div>

                            </article>
                            <?php $i += 1;
                            } ?>
                        
                    </div>
                </section>

                <!-- Section -->

                <!-- 投資理財Section  -->
                <section>
                    <header class="major">
                        <h2>投資理財</h2>
                    </header>
                    <div class="features">
                        <article>
                            <span><img src="images/灰階思考.jpg" alt="" /></span>
                            <div class="content">
                                <h3>灰階思考</h3>
                                <p>黑白之間都是灰，找到無限價值的所在。Podcast冠軍節目股癌製作人謝孟恭首本力作！</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <span><img src="images/股票作手回憶錄.jpg" alt="" /></span>
                            <div class="content">
                                <h3>灰階思考</h3>
                                <p>黑白之間都是灰，找到無限價值的所在。Podcast冠軍節目股癌製作人謝孟恭首本力作！</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <span><img src="images/致富心態.jpg" alt="" /></span>
                            <div class="content">
                                <h3>致富心態</h3>
                                <p>《華爾街日報》、亞馬遜書店暢銷書現代社會最重要、卻被嚴重被低估的技能</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <span><img src="images/漫步華爾街.jpg" alt="" /></span>
                            <div class="content">
                                <h3>灰階思考</h3>
                                <p>黑白之間都是灰，找到無限價值的所在。Podcast冠軍節目股癌製作人謝孟恭首本力作！</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Section -->

                <!-- 瀏覽Section  -->
                <section>
                    <header class="major">
                        <h2>瀏覽書籍</h2>
                    </header>
                    <div class="featuresforbrowse">
                        <article>
                            <span><img src="images/灰階思考.jpg" alt="" /></span>
                            <div class="content">
                                <h3>灰階思考</h3>
                                <p>黑白之間都是灰，找到無限價值的所在。Podcast冠軍節目股癌製作人謝孟恭首本力作！</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <span><img src="images/股票作手回憶錄.jpg" alt="" /></span>
                            <div class="content">
                                <h3>灰階思考</h3>
                                <p>黑白之間都是灰，找到無限價值的所在。Podcast冠軍節目股癌製作人謝孟恭首本力作！</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <span><img src="images/致富心態.jpg" alt="" /></span>
                            <div class="content">
                                <h3>致富心態</h3>
                                <p>《華爾街日報》、亞馬遜書店暢銷書現代社會最重要、卻被嚴重被低估的技能</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <span><img src="images/漫步華爾街.jpg" alt="" /></span>
                            <div class="content">
                                <h3>灰階思考</h3>
                                <p>黑白之間都是灰，找到無限價值的所在。Podcast冠軍節目股癌製作人謝孟恭首本力作！</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">立即借閱</a></li>
                                </ul>
                            </div>
                        </article>
                    </div>
                </section>

                <!-- Section -->
                <section>
                    <header class="major">
                        <h2>Ipsum sed dolor</h2>
                    </header>
                    <div class="content">
                        <article>
                            <span><img src="images/灰階思考.jpg" alt="" /></span>
                            <div class="content">
                                <h3>Interdum aenean</h3>
                                <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">More</a></li>
                                </ul>
                            </div>
                        </article>
                        <article>
                            <a href="#" class="image"><img src="images/股票作手回憶錄.jpg" alt="" /></a>
                            <h3>Nulla amet dolore</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class="actions">
                                <li><a href="#" class="button">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href="#" class="image"><img src="images/灰階思考.jpg" alt="" /></a>
                            <h3>Tempus ullamcorper</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class="actions">
                                <li><a href="#" class="button">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href="#" class="image"><img src="images/灰階思考.jpg" alt="" /></a>
                            <h3>Sed etiam facilis</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class="actions">
                                <li><a href="#" class="button">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href="#" class="image"><img src="images/灰階思考.jpg" alt="" /></a>
                            <h3>Feugiat lorem aenean</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class="actions">
                                <li><a href="#" class="button">More</a></li>
                            </ul>
                        </article>
                        <article>
                            <a href="#" class="image"><img src="images/灰階思考.jpg" alt="" /></a>
                            <h3>Amet varius aliquam</h3>
                            <p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
                            <ul class="actions">
                                <li><a href="#" class="button">More</a></li>
                            </ul>
                        </article>
                    </div>
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
