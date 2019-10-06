<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" class="rel">
    <link rel="stylesheet" href="views/css/main.css" class="rel">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a href="#" class="navbar-brand">kjhg</a>
        </div>
    </nav>
    
    <?php echo $content; ?>

    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../views/js/app.js"></script>
</body>
</html>