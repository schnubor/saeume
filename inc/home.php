<?php
    require( INCLUDE_DIR . 'renderProject.php' );
    $query = new \Contentful\Delivery\Query();
    $query->setContentType('project');
    try {
        $projects = $contentfulClient->getEntries($query);
    } catch (\Contentful\Core\Exception\NotFoundException $exception) {
        debug_to_console( 'Contentful error: ' . $exception );
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php renderHead( 'Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich', 'TODO: Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich' ) ?>

    <body>
        <?php include( TEMPLATE_DIR . '/navigation.php') ?>

        <section>
            <div class="container">
                <div class="row">
                <?php
                    foreach ($projects as $project) {
                        renderProject($project);
                    }
                ?>
                </div>
            </div>
        </section>

        <?php include( TEMPLATE_DIR . '/footer.php') ?>
    </body>
</html>