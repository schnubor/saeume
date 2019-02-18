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

    $renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
<?php renderHead( $project->headline, $project->metaDescription ) ?>
<body>
    <?php include( TEMPLATE_DIR . '/navigation.php' )?>

    <section>
        <div class="container">
            <h2><?php echo $project->headline ?></h2>
            
            <div class="images js-slick">
                <?php
                    foreach( $project->pictures as $asset ) {
                        echo '<div><img src="' . $asset->getFile()->getUrl() .'" /></div>';
                    }
                ?>
            </div>
            <p><?php echo $renderer->render($project->description) ?></p>

            <div class="row">

            </div>
        </div>
    </section>

    <?php include( TEMPLATE_DIR . '/footer.php') ?>
</body>
</html>