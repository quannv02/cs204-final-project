<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>public/css/head.css"></link>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&display=swap" rel="stylesheet">

    <title>WEXPress</title>
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-sm bg-white py-2 px-4">
        <a class="navbar-brand ml-1" href="<?= ROOT ?>">WEXP<span>ress</span></a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav ml-auto">
                <?php if($_SESSION['logged_in'] == true): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle mr-2" aria-hidden="true"></i><?= $_SESSION['user_name'];?></a>
                        <div class="dropdown-menu p-0" aria-labelledby="dropdownId">
                            <a class="dropdown-item p-2 text-center border-bottom" href="<?= ROOT ?>my-page">My feed</a>
                            <a class="dropdown-item p-2 text-center" href="<?= ROOT ?>logout">Log out</a>
                        </div>
                    </li>
                <?php else: ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= ROOT ?>signup">Sign up<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= ROOT ?>login">Log in<span class="sr-only">(current)</span></a>
                    </li>
                <?php endif ?>
                
            </ul>
        </div>
    </nav>