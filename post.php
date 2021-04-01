<?php
require_once "utils.php";
if (isset($_GET['post']) && $_GET['post'] != '') {
    $stmt = execSQL("SELECT * FROM posts WHERE url=?", array($_GET['post']));
    $r = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($r === false) {
        header("location:../blog/1");
        exit(0);
    }
} else {
    header("location:../blog/1");
    exit(0);
}
$date = date_create($r['date']);
$dt = date_format($date, "F jS, Y");
$a = explode(',', trim($r['author'], ","));
$t = explode(',', trim($r['tags'], ","));
$tag = array();
foreach ($t as $at) {
    array_push($tag, '<a href="../../tag/' . $at . '">' . $at . '</a>');
}

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $url = "https://";
else
    $url = "http://";
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
            content="Check out what <?php echo implode($a, ' & '); ?> have to say about <?php echo $r['title']; ?>">
        <meta name="keywords"
            content="Eclectic, IIITP, IIIT Pune, Blog, Club, Indian Institute of Information Technology Pune <?php echo $r['tags']; ?>">
        <meta property="og:type" content="metadata" />
        <meta property="og:title" content="<?php echo $r['title']; ?> - Blog Eclectic" />
        <meta property="og:description" content="Check out what <?php echo implode($a, ' & '); ?> have to say" />
        <meta property="og:image" content="https://eclecticiiitp.in/images/<?php echo $r['image']; ?>" />
        <meta property="fb:app_id" content="{989655511451887}" />
        <link rel="icon" type="image/png" href="../images/icon.png">
        <title><?php echo $r['title']; ?> - Blog Eclectic</title>
        <link rel="icon" type="image/png" href="../images/icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,700&amp;display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="../css/fontello.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/blog.css">
        <link rel="stylesheet" href="../css/share.css">
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    </head>

    <body style="background-image: linear-gradient(rgb(43, 77, 130),rgb(40, 144, 172));">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
            src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0&appId=989655511451887&autoLogAppEvents=1"
            nonce="QRlvEAwN"></script>

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
                    <a href="../" class="item"> HOME </a>
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

                <div class="blog_content">

                    <div class="blog_banner">
                        <h6><span><?php echo $dt; ?></span></h6>
                        <h1><?php echo $r['title']; ?></h1>
                        <img src="../images/<?php echo $r['image']; ?>" alt="">
                    </div>
                    <div class="article-content">
                        <?php echo $r['content']; ?>
                        <div class="sharing" style="text-align: center;">
                            <?php
                        echo '
                        <!-- Sharingbutton Facebook -->
                        <a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=https%3A%2F%2Feclecticiiitp.in%2Fpost%2F' . $r['url'] . '" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton Twitter -->
                        <a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=&amp;url=https%3A%2F%2Feclecticiiitp.in%2Fpost%2F' . $r['url'] . '" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M23.44 4.83c-.8.37-1.5.38-2.22.02.93-.56.98-.96 1.32-2.02-.88.52-1.86.9-2.9 1.1-.82-.88-2-1.43-3.3-1.43-2.5 0-4.55 2.04-4.55 4.54 0 .36.03.7.1 1.04-3.77-.2-7.12-2-9.36-4.75-.4.67-.6 1.45-.6 2.3 0 1.56.8 2.95 2 3.77-.74-.03-1.44-.23-2.05-.57v.06c0 2.2 1.56 4.03 3.64 4.44-.67.2-1.37.2-2.06.08.58 1.8 2.26 3.12 4.25 3.16C5.78 18.1 3.37 18.74 1 18.46c2 1.3 4.4 2.04 6.97 2.04 8.35 0 12.92-6.92 12.92-12.93 0-.2 0-.4-.02-.6.9-.63 1.96-1.22 2.56-2.14z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton LinkedIn -->
                        <a class="resp-sharing-button__link" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https%3A%2F%2Feclecticiiitp.in%2Fpost%2F' . $r['url'] . '&amp;title=&amp;summary=&amp;source=https%3A%2F%2Feclecticiiitp.in%2Fpost%2F' . $r['url'] . '" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--linkedin resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6.5 21.5h-5v-13h5v13zM4 6.5C2.5 6.5 1.5 5.3 1.5 4s1-2.4 2.5-2.4c1.6 0 2.5 1 2.6 2.5 0 1.4-1 2.5-2.6 2.5zm11.5 6c-1 0-2 1-2 2v7h-5v-13h5V10s1.6-1.5 4-1.5c3 0 5 2.2 5 6.3v6.7h-5v-7c0-1-1-2-2-2z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton Reddit -->
                        <a class="resp-sharing-button__link" href="https://reddit.com/submit/?url=https%3A%2F%2Feclecticiiitp.in%2Fpost%2F' . $r['url'] . '&amp;resubmit=true&amp;title=" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--reddit resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M24 11.5c0-1.65-1.35-3-3-3-.96 0-1.86.48-2.42 1.24-1.64-1-3.75-1.64-6.07-1.72.08-1.1.4-3.05 1.52-3.7.72-.4 1.73-.24 3 .5C17.2 6.3 18.46 7.5 20 7.5c1.65 0 3-1.35 3-3s-1.35-3-3-3c-1.38 0-2.54.94-2.88 2.22-1.43-.72-2.64-.8-3.6-.25-1.64.94-1.95 3.47-2 4.55-2.33.08-4.45.7-6.1 1.72C4.86 8.98 3.96 8.5 3 8.5c-1.65 0-3 1.35-3 3 0 1.32.84 2.44 2.05 2.84-.03.22-.05.44-.05.66 0 3.86 4.5 7 10 7s10-3.14 10-7c0-.22-.02-.44-.05-.66 1.2-.4 2.05-1.54 2.05-2.84zM2.3 13.37C1.5 13.07 1 12.35 1 11.5c0-1.1.9-2 2-2 .64 0 1.22.32 1.6.82-1.1.85-1.92 1.9-2.3 3.05zm3.7.13c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm9.8 4.8c-1.08.63-2.42.96-3.8.96-1.4 0-2.74-.34-3.8-.95-.24-.13-.32-.44-.2-.68.15-.24.46-.32.7-.18 1.83 1.06 4.76 1.06 6.6 0 .23-.13.53-.05.67.2.14.23.06.54-.18.67zm.2-2.8c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm5.7-2.13c-.38-1.16-1.2-2.2-2.3-3.05.38-.5.97-.82 1.6-.82 1.1 0 2 .9 2 2 0 .84-.53 1.57-1.3 1.87z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                        <!-- Sharingbutton WhatsApp -->
                        <a class="resp-sharing-button__link" href="whatsapp://send?text=%20https%3A%2F%2Feclecticiiitp.in%2Fpost%2F' . $r['url'] . '" target="_blank" rel="noopener" aria-label="">
                          <div class="resp-sharing-button resp-sharing-button--whatsapp resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--solid">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.1 3.9C17.9 1.7 15 .5 12 .5 5.8.5.7 5.6.7 11.9c0 2 .5 3.9 1.5 5.6L.6 23.4l6-1.6c1.6.9 3.5 1.3 5.4 1.3 6.3 0 11.4-5.1 11.4-11.4-.1-2.8-1.2-5.7-3.3-7.8zM12 21.4c-1.7 0-3.3-.5-4.8-1.3l-.4-.2-3.5 1 1-3.4L4 17c-1-1.5-1.4-3.2-1.4-5.1 0-5.2 4.2-9.4 9.4-9.4 2.5 0 4.9 1 6.7 2.8 1.8 1.8 2.8 4.2 2.8 6.7-.1 5.2-4.3 9.4-9.5 9.4zm5.1-7.1c-.3-.1-1.7-.9-1.9-1-.3-.1-.5-.1-.7.1-.2.3-.8 1-.9 1.1-.2.2-.3.2-.6.1s-1.2-.5-2.3-1.4c-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6s.3-.3.4-.5c.2-.1.3-.3.4-.5.1-.2 0-.4 0-.5C10 9 9.3 7.6 9 7c-.1-.4-.4-.3-.5-.3h-.6s-.4.1-.7.3c-.3.3-1 1-1 2.4s1 2.8 1.1 3c.1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 1.9-1.3.2-.7.2-1.2.2-1.3-.1-.3-.3-.4-.6-.5z"/></svg>
                            </div>
                          </div>
                        </a>
                        
                    ' ?>
                        </div>
                    </div>

                </div>
                <div class="footer_blog">
                    <div class="author">
                        <div class="authorheading">Published by <?php echo implode($a, ' & '); ?></div>
                        <div class="authorposts">
                            <?php
                        foreach ($a as $at) {
                            echo '<a href="../../author/' . urlencode($at) . '"><span class="fas fa-box"></span>View all posts by ' . $at . '</a>';
                        }
                        ?>
                        </div>
                    </div>
                    <div class="tags">
                        <time class="publish_date"><span class="fa fa-clock-o"
                                style="margin-right: 10px;"></span><?php echo $dt; ?></time>
                        <p><span class="fa fa-tag" style="margin-right: 10px;"></span> <span class="tagname">
                                <?php echo implode($tag, ', '); ?></span></p>
                    </div>
                </div>

                <h2>Leave a Comment</h2>
                <div class="fb_comments">
                    <div class="fb-comments" data-href="<?php echo $url; ?>" data-numposts="4" data-width="100%"></div>
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
                        <a class="item foot" href="#"><span class="fas fa-envelope fa"></span> <span class="text">
                                Mail</span></a><br>
                        <a class="item foot" href=""><span class="fa fa-2x fa-instagram gradient"></span><span
                                class="text">
                                Instagram</span></a><br>
                        <a class="item foot" href=""><span class="fa fa-2x fa-facebook-square"></span><span
                                class="text">
                                Facebook</span></a><br>
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