<?php 
    session_start();
    $m='';
    $l='';
    if(!isset($_SESSION['username']))
    {
        header('location: login');
        exit(0);
    }
    require_once "../utils.php";
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $a = explode(',',trim($_POST['authors'],","));
        $pass = true;
        foreach( $a as $at ){
            $result = $conn->query("SELECT name FROM authors WHERE name = '".$at."'");
            if($result->rowcount()==1) {
                $pass = true;
            }
            else {
                $l = '<br><div class="alert alert-danger" role="alert">'.$at.' not Present in the DataBase. Try Again.</div><br>';
                $pass = false;
                break;
            }
        }
        if ($pass == true){
            $stmt=execSQL('INSERT INTO posts VALUES(?,?,?,?,?,?,?,?,?)',array(null,$_POST['title'],$_POST['url'],$_POST['content'],','.$_POST['authors'].',',','.$_POST['tags'].',',$_POST['thumbnail'],$_POST['summary'],$_POST['date']));
            $m= '<br><div class="alert alert-success" role="alert">Article successfully Posted.</div><br>';
            foreach( $a as $at ){
                $d = date('Y-m-d');
                $sql = $conn->query("UPDATE authors SET posts = posts+1, updated = '".$d."' WHERE name = '".$at."'");
                // $sql = $conn->query("UPDATE authors SET posts = posts+0, updated = '".$d."' WHERE name = '".$at."'");
                // $sql = $conn->query("UPDATE authors SET posts = posts+1 WHERE name = '".$at."'");
            }
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Blog Post | Eclectic Club</title>
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
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/theme/monokai.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/codemirror.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/codemirror/3.20.0/mode/xml/xml.js"></script>
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
                <a class="btn-sm btn-primary" href="dashboard.php">Go back to Dashboard</a>
                <a class="btn-sm btn-danger" href="logout.php" style="float:right">Log Out</a>
                <h3>Create a New Post.</h3>
                <?php echo $m; ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="title">Title : </label>
                        <input id="title" class="form-control" type="text" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="url">/blog/</label>
                        <input id="url" class="form-control" type="text" name="url" required>
                        <small class="form-text text-muted">Alpha-numeric characters and dashes only.</small>
                    </div>
                    <div class="form-group">
                        <label for="date">Date : </label>
                        <input id="date" class="form-control" rows="15" type="date" name="date"
                            value="<?php echo date('Y-m-d',time()) ?>" required>
                    </div>
                    <div class="form-group ">
                        <label for="content">Content : </label>
                        <textarea id="content" class="form-control" name="content"></textarea>
                        <br>
                    </div>
                    <div class="form-group">
                        <label for="authors">Authors : </label>
                        <input id="authors" class="form-control" type="text" name="authors" required>
                        <small class="form-text text-muted">Seperated by comma if multiple.</small>
                    </div>
                    <div class="form-group">
                        <label for="tags">Tags : </label>
                        <input id="tags" class="form-control" type="text" name="tags" required>
                        <small class="form-text text-muted">Seperated by comma if multiple.</small>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail : </label>
                        <input id="thumbnail" class="form-control" type="text" name="thumbnail" required>
                    </div>
                    <div class="form-group">
                        <label for="summary">Summary : </label>
                        <input id="summary" class="form-control" type="text" name="summary" required>
                    </div>
                    <br>
                    <input type="submit" value="POST" class="btn btn-success">
                    <a href="dashboard" class="btn btn-secondary">Cancel</a>
                    <br><br><br><br>
                </form>
            </div>

        </div>
        <div class="copyright">
            <p>&copy; All rights reserved Ecelctic IIIT Pune | 2020</p>
        </div>
    </div>
    <script src="../js/script.js"></script>
    <script src="summernote-cleaner.js"></script>
    <script typt="text/javascript" src="../js/add.js"></script>

</body>

</html>