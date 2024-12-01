<?php
$title = 'Blog Beti';

require 'assets/header.php';

require 'database.php';

$statement = $pdo->prepare("SELECT * FROM posts");
$statement->execute();


$posts = $statement->fetchAll();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['DELETE'])) {
    
    
    
    $post_id = $_POST['post_id'];
    
    $statement = $pdo->prepare("DELETE FROM posts WHERE id = ?");
    $statement->execute([$post_id]);
    $_SESSION['post-oshirildi'] = 'Post oshti!';

    header("Location: blog.php");
    exit; 
}
?>

<body>
    <div class="container py-4">
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light">Bizin Blog</h1>
                    <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                    <p>
                        <a href="post-create.php" class="btn btn-primary my-2">Post jaratiw</a>
                        <a href="index.php" class="btn btn-secondary my-2">Bas betke otiw</a>
                    </p>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
                
                <?php if (isset($_SESSION['post-jaratildi'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?= $_SESSION['post-jaratildi'] ?>
                        <?php unset($_SESSION['post-jaratildi']) ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_SESSION['post-oshirildi'])): ?>
                    <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['post-oshirildi'] ?>
                    <?php unset($_SESSION['post-oshirildi']) ?>                    </div>
                <?php endif; ?>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($posts as $post) : ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg>
                                <div class="card-body">
                                    <div>
                                        <a href="post.php?id=<?= $post['id'] ?>">
                                            <h5><?= $post['title']; ?></h5>
                                        </a>
                                    </div>
                                    <p class="card-text"><?= $post['body']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="post-edit.php?id=<?= $post['id'];?>"> <button class="btn btn-sm btn-outline-secondary">Edit</button></a>

                                            <form method="POST" action="" onsubmit="return confirm('Aniq oshirejaqsizba ?')">

                                                <input type="hidden" name="post_id" value="<?= $post['id']; ?>">

                                                <input type="hidden" name="DELETE">

                                                <button type="submit" class="btn btn-sm btn-outline-secondary">Delete</button>

                                            </form>
                                            
                                        </div>
                                        <small class="text-body-secondary"><?= $post['created_at'] ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <?php require 'assets/footer.php'; ?>