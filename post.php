<?php
$title = 'Post';
require 'assets/header.php';
require 'database.php'; 

$id = $_GET['id'];


$statement = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
$statement->execute([$id]);
$post = $statement->fetch();



?>
<div class="container mt-5">
    <h1 class="text-body-emphasis"><?= $post['id']; ?></h1>
    <h1 class="text-body-emphasis"><?= $post['title']; ?></h1>
    <p class="fs-5 col-md-8"><?= $post['body']?></p>
    <p class="fs-5 col-md-8"><?= $post['created_at']?></p>

   
    <hr class="col-3 col-md-2 mb-5">
</div>



<?php require 'assets/footer.php'; ?>