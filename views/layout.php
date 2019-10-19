<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="views/img/logo.ico">
    <link rel="stylesheet" href="node_modules/fontawesome/css/all.min.css" class="rel">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" class="rel">
    <link rel="stylesheet" href="views/css/main.css" class="rel">
    <link rel="stylesheet" href="<?php echo $style; ?>" class="rel">

</head>
<body>
    <div class="gif">
        <img src="views/img/chargement.gif" alt="gif">
    </div>

    <div id="content">
        <?php echo $content; ?>
    </div>

    <script type="text/javascript"src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="views/js/app.js"></script>
</body>
</html>