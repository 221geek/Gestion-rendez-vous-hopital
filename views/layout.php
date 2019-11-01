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
    <link rel="stylesheet" href="<?php echo $style1; ?>" class="rel">
    <link rel="stylesheet" href="<?php echo $style2; ?>" class="rel">

    <script src="views/js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/util.js"></script>
    <script src="views/js/app.js"></script>
</head>
<body>
    <div class="gif">
        <img src="views/img/chargement.gif" alt="gif">
    </div>

    <div id="content">
        <?php echo $content; ?>
    </div>

</body>
</html>