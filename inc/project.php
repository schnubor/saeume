<?php
    require( TEMPLATE_DIR . 'renderSlide.php' );
    $uri = rtrim( dirname($_SERVER["SCRIPT_NAME"]), '/' );
    $uri = '/' . trim( str_replace( $uri, '', $_SERVER['REQUEST_URI'] ), '/' );
    $uri = urldecode( $uri );
    $projectId = substr($uri, strrpos($uri, '/') + 1);
    $query = new \Contentful\Delivery\Query();
    $query->setContentType('project');

    try {
        $project = $contentfulClient->getEntry( $projectId );
        $allProjects = $contentfulClient->getEntries($query);
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
            <h2 class="title"><?php echo $project->headline ?></h2>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="js-slick">
                        <?php
                            foreach( $project->pictures as $asset ) {
                                echo '<div><img src="' . $asset->getFile()->getUrl() .'" /></div>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md-4 facts">
                    <?php
                        if( $project->facts ) {
                            echo nl2br($renderer->render($project->facts));
                        }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <?php echo nl2br($renderer->render($project->description)) ?>
                </div>
            </div>

            <hr class="divider">
        </div>
        
        <div class="more">
            <div class="container">
                <h4 class="more-title">Weitere Projekte</h4>
                <div class="arrow-wrapper">
                    <div class="js-slick-multiple more-wrapper">
                        <?php
                            foreach ($allProjects as $otherProject) {
                                if( $project->getId() != $otherProject->getId() ) {
                                    renderSlide($otherProject);
                                }
                            }
                        ?>
                    </div>
                    <div class="js-next arrow next">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                    <div class="js-prev arrow prev">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include( TEMPLATE_DIR . '/footer.php') ?>
</body>
</html>