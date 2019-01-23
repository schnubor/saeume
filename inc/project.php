<?php
    $uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
    $uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
    $uri = urldecode( $uri );
    $projectId = substr($uri, strrpos($uri, '/') + 1);

    try {
        $project = $contentfulClient->getEntry( $projectId );
    } catch (\Contentful\Core\Exception\NotFoundException $exception) {
        debug_to_console( 'Contentful error: ' . $exception );
    }
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
    <h2><?php echo $project->headline ?></h2>
    <p><?php echo $project->description ?></p>
    <div class="images">
        <?php
            foreach( $project->pictures as $asset ) {
                echo '<img src="' . $asset->getFile()->getUrl() .'" />';
            }
        ?>
    </div>
</body>
</html>