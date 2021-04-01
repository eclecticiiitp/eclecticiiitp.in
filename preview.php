<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog Preview | Eclectic</title>
        <link rel="icon" type="image/png" href="./images/icon.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>

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

        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/blog.css">
    </head>

    <body style="background-image: linear-gradient(rgb(43, 77, 130),rgb(40, 144, 172)); overflow:auto;">
        <div class="c1">
            <div class="main_content ">
                <div class="blog_content">
                    <div id="prevw"></div>
                    <form method="post" action="" id="prevwform">
                        <div class="form-group">
                            <label for="title">Title : </label>
                            <input id="title" class="form-control" type="text" name="title" required>
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
                            <label for="thumbnail">Thumbnail : </label>
                            <input id="thumbnail" class="form-control" type="text" name="thumbnail" required>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="./js/script.js"></script>
        <script src="./summernote-cleaner.js"></script>
        <script typt="text/javascript" src="./js/preview.js"></script>

    </body>

</html>