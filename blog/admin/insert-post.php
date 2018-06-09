<?php
    include_once '../config.php';
    $result = false;

    if (!empty($_POST)) {
        $sql = 'INSERT INTO blog_posts (title, content) VALUES (:title, :content)';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
    }
?>
<html>
    <head>
        <title>Blog with Platzi</title>
        <!-- link CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Blog Wilmar</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <h2>New Post</h2>   
                    <p>
                    <a class="btn" href="posts.php">Back</a>
                    </p>                    
                    <?php
                        if ($result) {
                            echo '<div class="alert alert-success">Post Saved!</div>';
                        }                    
                    ?>
                    <form action="insert-post.php" method="post">
                        <div class = "form-group">
                            <label for="inputTitle">Title</label>                        
                            <input type="text" class="form-control" name="title" id="inputTitle">                            
                        </div>
                        <textarea class="form-control" name="content" id="inputContent" rows="5"></textarea>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Save">
                    </form>
                </div>        
                <div class="col-md-4">
                    Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.
                </div>            
            </div>
            <div class="row">
                <div class="col-md-12">
                    <footer>
                        This is a footer<br>
                        <a href="admin/index.php">Admin Panel</a>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>