<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="RehearsalZ est un site dédié aux musicien.ne.s pour faciliter les répétitions en solo !" />
        
        <!-- CSS -->
        <link rel="stylesheet" href="/PUBLIC/css/commonStyle.css">
        <link rel="stylesheet" href="/PUBLIC/css/jplayer.pink.flag.min.css">
        <!-- favicon -->
        <link rel="icon" type="image/x-icon" href="PUBLIC/assets/favicon-32x32.png">
        
        <!-- title -->
        <title>RehearsalZ <?php if(isset($_GET['page'])): echo (" - ".get_title()); endif;?></title>
        
    </head>

    <body>

        <header class="header">

            <!-- navbar -->
            <?php require realpath('SRC/views/templates/navbar.php') ?>
        
        </header>