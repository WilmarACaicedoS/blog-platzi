<?php
include_once 'config.php';
$result = false;

if (!empty($_POST)) {
    $id = $_POST['id'];
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];

    $sql = "UPDATE users SET name=:name,email=:email WHERE id=:id";
    $query = $pdo->prepare($sql);
    $query->bindParam('id', $idParam);
    $query->bindParam('name', $nameParam);
    $query->bindParam('email', $emailParam);
    $idParam = $id;
    $nameParam = $newName;
    $emailParam = $newEmail;
    $result = $query->execute();

    $nameValue = $newName;
    $emailValue = $newEmail;
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=:id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();

    $row = $query->fetch(PDO::FETCH_ASSOC);
    $nameValue = $row['name'];
    $emailValue = $row['email'];
}

?>

<html>
    <head>
        <title>Databases with Platzi</title>
        <!-- link CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>Update User</h1>
            <a href="list.php">Back</a>
            <?php
                if ($result) {
                    echo '<div class="alert alert-success">Success!!!</div>';                    
                }
            ?>
            <form action="update.php" method="post">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?= $nameValue ?>">
                <br>
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?= $emailValue ?>">
                <br>
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="submit" value="Update">
            </form>
        </div>
    </body>
</html>