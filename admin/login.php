<?php
    $user='username';
    $password='password';
    $m='';
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        if($_POST['username']==$user && $_POST['password']==$password)
        {
            session_start();
            $_SESSION['username']='admin';
            header('location:dashboard');
        }
        else
        {
            $m= '<br><div class="alert alert-danger" role="alert">Invalid login credentials !!!</div><br>';

        }
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Login | Eclectic Club</title>
        <link rel="icon" type="image/png" href="../images/icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css"> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script> -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
        </script>

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <link
            href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,700&amp;display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/blog.css">
    </head>

    <body style="background-image: linear-gradient(rgb(43, 77, 130),rgb(40, 144, 172)); overflow:auto;">
        <div class="logo" id="logo">
            <div class="logo" id="logo">
                <a class="logobox" href="#">Eclectic!</a>
                <br>
                <br>
            </div>
        </div>
        <div class="c1">
            <div class="main_content ">
                <div class="blog_content">
                    <h3>Login</h3>
                    <?php echo $m; ?>
                    <form method="post" style="max-width:500px;margin:auto;">
                        <div class="form-group">
                            <label for="username">Username : </label>
                            <input id="username" class="form-control" type="text" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password : </label>
                            <input id="password" class="form-control" type="password" name="password" required>
                        </div>
                        <input type="submit" value="LOGIN" class="btn btn-success">
                    </form>
                </div>

            </div>
            <div class="copyright">
                <p>&copy; All rights reserved Ecelctic IIIT Pune | 2020</p>
            </div>
        </div>
        <script src="../js/script.js"></script>
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