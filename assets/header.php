<!-- Main -->
<!DOCTYPE html>
<html lang="en">

<?php 

session_start();

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <title><?=$title ?? 'PHP Blog';?></title>
</head>

<body>
    <main>
        <!-- Header -->
        <header data-bs-theme="dark">
            <?php require 'navbar.php'; ?>
        </header>