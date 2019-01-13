<?php
    $uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
    $uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
    $uri = urldecode( $uri );
    $slug = substr($uri, strrpos($uri, '/') + 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $slug?></title>
</head>
<body>
    <h1 class="js-headline"></h1>
    <p class="js-description"></p>
    <div class="js-images"></div>

    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/contentful@latest/dist/contentful.browser.min.js"></script>
    <script src="/assets/js/contentful.js"></script>
    <script type="text/javascript">
        getProject(<?php $slug ?>);
    </script>
</body>
</html>