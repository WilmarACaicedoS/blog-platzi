<?php

require_once 'config.php';

$limit = $_GET['limit'] ?? 100;
/*$sql = "SELECT * FROM users LIMIT :limit";
$queryResult = $pdo->prepare($sql);
$queryResult->bindValue('limit', $limit, PDO::PARAM_INT);
$queryResult->execute();*/

$queryResult = $pdo->query("SELECT * FROM users");

?>
<html>
    <head>
        <title>Databases with Platzi</title>
        <!-- link CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <h1>List Users</h1>
            <ul>                
                <a href="index.php">Home</a>                
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    <?php
                    while ($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {                                                
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td><a href="update.php?id=' . $row['id'] . '">Edit</a></td>';
                        echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                        echo '</tr>';
                    }
                    ?>
                </table>
            </ul>
        </div>
    </body>
</html>