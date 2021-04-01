<?php
    require_once "utils.php";
    if(!isset($_GET['name']) || $_GET['name']=='')
    {
        header('location: ../blog/1');
        exit(0);
    }
    $name=urldecode($_GET['name']);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content='Explore blog articles tagged with "<?php echo $name; ?>"'>
        <meta name="keywords"
            content="Eclectic, IIITP, IIIT Pune, Blog, Club, Indian Institute of Information Technology Pune, Authors">
        <meta property="og:title" content="<?php echo $name; ?> - Eclectic" />
        <meta property="og:description" content="Explore posts tagged with <? echo $name?>" />
        <meta property="og:image" content="https://eclecticiiitp.in/images/logo.png" />
        <link rel="icon" type="image/png" href="../images/icon.png">
        <title><?php echo $name; ?> - Eclectic Club</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,700&amp;display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

        <!-- <script src="https://use.fontawesome.com/f261e38cdb.js"></script> -->
        <!-- <script src="https://kit.fontawesome.com/6eb6817c88.js" crossorigin="anonymous"></script> -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" /> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
        </script>
        <link rel="stylesheet" href="../css/fontello.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/blog.css">
        <link rel="stylesheet" href="../css/blognew.css">
        <link rel="stylesheet" type="text/css" href="../css/component.css">
    </head>

    <body>
        <div class="loadwrapper" id="loader">
            <span class="loader"><span class="loader-inner"></span></span>
            <span class="text">Blending Ideas For You!</span>
        </div>
        <div class="logo" id="logo">
            <div class="logo" id="logo">
                <a class="logobox" href="../">Eclectic!</a>
            </div>
        </div>
        <div class="c1">
            <button class="nav-toggle" id="show"><span class="fa fa-bars"></span></button>
            <div class="nav" id="nav">
                <button class="toggle" id="hide"><span>&times;</span></button>
                <div class="n1">
                    <a href="../index" class="item "> HOME </a>
                    <a href="../blog" class="item active"> BLOG </a>
                    <a href="../podcast" class="item"> PODCASTS </a>
                    <a href="../updates" class="item"> UPDATES </a>
                    <a href="../excursions" class="item"> EXCURSIONS </a>
                    <a href="../gallery" class="item"> GALLERY </a>
                    <a href="../aboutus" class="item"> THIS IS ECLECTIC </a>
                </div>
                <div class="n2">
                    <a href="https://open.spotify.com/show/27SVrjNtjRdWRQnJaWNIEn?si=oyaRB1quSD2UD5zwQSoGrA"
                        class="item"><span class="fa fa-2x fa-spotify"></span></a>
                    <a href="https://www.instagram.com/eclecticiiitp/" class="item"><span
                            class="fa fa-2x fa-instagram"></span></a>
                    <a href="https://www.facebook.com/eclecticiiitp" class="item"><span
                            class="fa fa-2x fa-facebook-square"></span></a>
                </div>
            </div>
            <div class="main_content">
                <h1>Posts With Tag <span class="tagname"><?php echo $name; ?></span>&nbsp<span style="font-size: 70%"
                        class="fa-tag"></span></h1>
                <ul class="grid effect-3" id="grid">
                    <?php
                        require_once "utils.php";
                        $stmt=execSQL("SELECT * FROM posts WHERE tags LIKE ?",array('%,'.$name.',%'));
                        $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
                        $color=array('one','two','three','four','five','six');
                        $x=0;

                        foreach($row as $r)
                        {
                            $date = date_create(($r['date']));;
                            $fd = date_format($date,"jS F Y");
                            echo '
                            <li>
                                <div class="column_card">
                                    <div class="blogheader"><a href="../post/'.$r['url'].'" >'.$r['title'].'</a></div>
                                    <a href="../post/'.$r['url'].'" >
                                        <div class="image_container"> <img src="../images/'.$r['image'].'">
                                            <div class="overlay '.$color[$x%6].'"></div>
                                            <div class="overlaytext"></div>
                                        </div>
                                    </a>
                                    <p>'.$r['summary'].'<br>
                                        <a id="b_continue" href="../post/'.$r['url'].'" >Continue Reading <span class="fas fa-external-link-alt"></span></a>
                                    </p>
                                <div class="blog_footer"><span style="margin-right: 5px;" class="fa fa-calendar"></span>Published: '.$fd.'</div>
                                </div>
                            </li>';
                            $x++;
                        }
                    ?>

                </ul>
                <div class="wrapper">
                    <div class="pagination">
                        <a href="#">&laquo;</a>
                        <a class="active-page" href="#">1</a>
                        <!-- <a href="#">2</a> -->
                        <!-- <a href="#">3</a>
                    <a href="#">4</a>
                    <a href="#">5</a>
                    <a href="#">6</a> -->
                        <a href="#">&raquo;</a>
                    </div>
                </div>
            </div>
            <div class="footer grid">
                <div class="grid-item" id="one">
                    <div class="footer_heading" id="one"> Contact Us </div>
                    <form method="post" id="contact-form">
                        <div class="form-group">
                            <input id="name" class="form-control form-control-sm" type="text" name="name"
                                placeholder=" &#xe806;  Your Name">
                        </div>
                        <div class="form-group">
                            <input id="email" class="form-control form-control-sm" type="email" name="email"
                                placeholder=" &#xf2b6;  Your e-mail">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control form-control-sm" name="message" id="message" rows="3"
                                placeholder=" &#xe803;  Message"></textarea>
                        </div>
                        <input id="submit" class="btn btn-secondary btn-sm" type="submit" value="Send Message">
                        <br>
                        <div id="alert"></div>
                        <br>
                    </form>
                </div>
                <div class="grid-item" id="two">
                    <div class="footer_heading" id="two">Follow Us</div>
                    <div class="social">
                        <a class="item foot" href="mailto:eclecticiiitp@gmail.com"><span
                                class="fas fa-envelope fa"></span> <span class="text"> Mail</span></a><br>
                        <a class="item foot" href="https://www.instagram.com/eclecticiiitp/"><span
                                class="fa fa-2x fa-instagram gradient"></span><span class="text">
                                Instagram</span></a><br>
                        <a class="item foot" href="https://www.facebook.com/eclecticiiitp"><span
                                class="fa fa-2x fa-facebook-square"></span><span class="text"> Facebook</span></a><br>
                        <a class="item foot"
                            href="https://open.spotify.com/show/27SVrjNtjRdWRQnJaWNIEn?si=oyaRB1quSD2UD5zwQSoGrA"><span
                                class="fa fa-2x fa-spotify"></span><span class="text"> Spotify</span> </a><br>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; All rights reserved Eclectic IIIT Pune | 2020</p>
            </div>
        </div>

        <script src="../js/script.js"></script>
        <script src="../js/modernizr.custom.js"></script>
        <script src="../js/masonry.pkgd.min.js"></script>
        <script src="../js/imagesloaded.js"></script>
        <script src="../js/classie.js"></script>
        <script src="../js/AnimOnScroll.js"></script>
        <script>
        new AnimOnScroll(document.getElementById('grid'), {
            minDuration: 0.4,
            maxDuration: 0.6,
            viewportFactor: 0.2
        });
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=GoogleAnalysisID"></script>
        <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'GoogleAnalysisID');
        </script>

    </body>

</html>