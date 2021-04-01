<?php
    session_start();
    $m='';
    if(!isset($_SESSION['username']))
    {
        header('location: login');
        exit(0);
    }
    require_once "../utils.php";
    if(isset($_GET['id']) && $_GET['id']!='')
    {
        $stmt=execSQL("SELECT * FROM posts WHERE id=?",array($_GET['id']));
        $r=$stmt->fetch(PDO::FETCH_ASSOC);
        if($r===false)
        {
            header("location:../command-centre/dashboard");
            exit(0);
        }
    }
    else
    {
        header("location:../command-centre/dashboard");
        exit(0);
    }
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $stmt=execSQL('UPDATE posts SET title=?,url=?,content=?,author=?,tags=?,image=?,summary=?,date=? WHERE id=?',array($_POST['title'],$_POST['url'],$_POST['content'],','.$_POST['authors'].',',','.$_POST['tags'].',',$_POST['thumbnail'],$_POST['summary'],$_POST['date'],$r['id']));
        $m= '<br><div class="alert alert-success" role="alert">Article Edited Successfully. <a href="../command-centre/dashboard">Back to DashBoard</a></div><br>';
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Blog Post | Eclectic Club</title>
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
            href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,600;0,700;0,900;1,400;1,600;1,700&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.css">
        <link rel="stylesheet" type="text/css"
            href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js">
        </script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/2.36.0/formatting.js"></script>

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
                    <a class="btn-sm btn-primary" href="../command-centre/dashboard">Go back to Dashboard</a>
                    <a class="btn-sm btn-danger" href="../command-centre/logout" style="float:right">Log Out</a>
                    <h3>edit a Post.</h3>
                    <?php echo $m; ?>
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="title">Title : </label>
                            <input id="title" class="form-control" type="text" name="title" required
                                value="<?=$r['title']?>">
                        </div>
                        <div class="form-group">
                            <label for="url">/blog/</label>
                            <input id="url" class="form-control" type="text" name="url" required value="<?=$r['url']?>">
                            <small class="form-text text-muted">Alpha-numeric characters and dashes only.</small>
                        </div>
                        <div class="form-group">
                            <label for="date">Date : </label>
                            <input id="date" class="form-control" rows="15" type="date" name="date"
                                value="<?=$r['date']?>" required>
                        </div>
                        <div class="form-group ">
                            <label for="content">Content : </label>
                            <textarea id="content" class="form-control" name="content"><?=$r['content']?></textarea>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="authors">Authors : </label>
                            <input id="authors" class="form-control" type="text" name="authors" required
                                value="<?=trim($r['author'],",")?>">
                            <small class="form-text text-muted">Seperated by comma if multiple.</small>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags : </label>
                            <input id="tags" class="form-control" type="text" name="tags" required
                                value="<?=trim($r['tags'],",")?>">
                            <small class="form-text text-muted">Seperated by comma if multiple.</small>
                        </div>
                        <div class="form-group">
                            <label for="thumbnail">Thumbnail : </label>
                            <input id="thumbnail" class="form-control" type="text" name="thumbnail" required
                                value="<?=$r['image']?>">
                        </div>
                        <div class="form-group">
                            <label for="summary">Summary : </label>
                            <input id="summary" class="form-control" type="text" name="summary" required
                                value="<?=$r['summary']?>">
                        </div>
                        <br>
                        <input type="submit" value="Confirm Edit" class="btn btn-success">
                        <a href="../command-centre/dashboard" class="btn btn-secondary">Cancel</a>
                        <br><br><br><br>
                    </form>
                </div>

            </div>
            <div class="copyright">
                <p>&copy; All rights reserved Ecelctic IIIT Pune | 2020</p>
            </div>
        </div>
        <script src="../js/script.js"></script>
        <script src="../command-centre/summernote-cleaner.js"></script>
        <script typt="text/javascript" src="../js/add.js"></script>
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