<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" class="rel">
    <link rel="stylesheet" href="<?php echo $style; ?>" class="rel">
</head>
<body>
    
    <?php echo $content; ?>

    <script src="views/js/app.js"></script>
</body>
</html>