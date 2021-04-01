<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Speak-Up Eclectic! - A podcast by Eclectic. Coming Soon.">
        <meta name="keywords"
            content="Eclectic, IIITP, IIIT Pune, Blog, Club, Indian Institute of Information Technology Pune, Podcast">
        <meta property="og:type" content="metadata" />
        <meta property="og:url" content="https://eclecticiiitp.in/podcast" />
        <meta property="og:title" content="Speak-Up Eclectic!" />
        <meta property="og:description"
            content="Explore 'Yours, Clueless' - the Only Podcast of IIIT Pune by Eclectic" />
        <meta property="og:image" content="https://eclecticiiitp.in/images/podcastArt.png" />
        <title>Podcast - Eclectic</title>
        <link rel="icon" type="image/png" href="images/icon.png">
        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,300;1,400;1,600;1,700;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="../css/fontello.css">
        <link rel="stylesheet" href="../includes/glider.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/podcast.css">


    </head>

    <body>
        <div class="loadwrapper" id="loader">
            <span class="loader"><span class="loader-inner"></span></span>
            <span class="text">Brewing Interesting Content!</span>
        </div>
        <div class="logo" id="logo">
            <div class="logo" id="logo">
                <a class="logobox" href="../index">Eclectic!</a>
            </div>
        </div>
        <div class="c1">
            <button class="nav-toggle" id="show"><span class="fa fa-bars"></span></button>
            <div class="nav" id="nav">
                <button class="toggle" id="hide"><span>&times;</span></button>
                <div class="n1">
                    <a href="../" class="item "> HOME </a>
                    <a href="../blog" class="item"> BLOG </a>
                    <a href="../podcast" class="item" style="background-color:#000"> PODCASTS </a>
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
                <div class="podcast-con">
                    <div class="text-content">
                        <br>
                        <br>
                        <!--<h1 id="neon">Yours, Clueless</h1>-->
                        <p id="text-neon">
                            Nothing is more awake than a clueless mind, adorn yours as an armour.
                            We here at Eclectic, believe that heading into something unplanned may not be a Batman-esque
                            trait,
                            but it's too HARSH to judge that negatively. With the same kind of planning (NOT!) we bring
                            to you a podcast with bounds unimaginable (quite literally) and expressions unfiltered
                            (parliamentary, ofc).
                            Welcome to "Yours, Clueless", where the best content is always the objective.
                        </p>
                        <a href="https://open.spotify.com/show/27SVrjNtjRdWRQnJaWNIEn?si=jUT9roujQfSrjBLKToN4jQ"
                            target="_blank"><img class="spotifylink" src="images/badge.png" alt=""></a>
                    </div>
                    <br>
                </div>

                <h2 class="series-title">Senior Note</h2>
                <div class="glider-contain">
                    <div class="glider">
                        <div class="citems">
                            <span class="effect2"><img src="../images/SrNote01.jpg"></span>
                            <div class="podtext">
                                <h3>Chapter 1</h3><button class="btn btn-light btn-md"
                                    onclick="play('4tz2eVbFmXFf79Je0USPrW')"><span class="fas fa-headphones-alt"></span>
                                    Listen Now</button>
                                <span><i class="far fa-calendar"></i><span class="date">27th February 2021</span></span>
                            </div>

                        </div>
                    </div>

                    <span aria-label="Previous" class="glider-prev"><span class="fas fa-left-dir"></span></span>
                    <span aria-label="Next" class="glider-next"><span class="fas fa-right-dir"></span></span>
                    <div role="tablist" class="dots"></div>
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
                                class="fas fa-envelope fa"></span>
                            <span class="text"> Mail</span></a><br>
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
            <div class="player" id="player"></div>
            <div class="copyright">
                <p>&copy; All rights reserved Eclectic IIIT Pune | 2020</p>
            </div>

        </div>


        <script src="../includes/glider.min.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/podcast2.js"></script>
    </body>

</html>