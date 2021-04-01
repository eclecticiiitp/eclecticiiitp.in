<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header('location: login');
        exit(0);
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin DashBoard | Eclectic Club</title>
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

                <div class="blog_content" style="min-height:500px;">
                    <h3>Admin Dashboard.</h3>
                    <a class="btn-sm btn-danger" href="logout" style="float:right">Log Out</a>
                    <br><br>
                    <a href="add" class="btn btn-success">Submit a new Blog Post</a> &nbsp; <a href="upload"
                        class="btn btn-primary">Upload an Image</a>
                    <br><br>
                    <h3 style="margin:0px auto;">Edit Posts.</h3>
                    <br>
                    <table class="table table-light">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                        require_once "../utils.php";
                        $row=$conn->query("SELECT id,title,date FROM posts ORDER BY id DESC");
                        foreach($row as $r)
                        {
                            echo '<tr><td>'.$r['id'].'</td><td>'.$r['title'].'</td><td>'.$r['date'].'</td><td><a href="../command-centre-edit/'.$r['id'].'" class="btn btn-warning btn-sm">Edit</a></td></tr>';
                        }
                        ?>
                        </tbody>
                    </table>
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