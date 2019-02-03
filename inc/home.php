<?php
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
        
        <ul>
        <?php
            foreach ($projects as $project) {
                echo '<li><a href="/project/' . $project->getId() . '">' . $project->headline . '</a></li>';
            }
        ?>
        </ul>

        <?php include( TEMPLATE_DIR . '/footer.php') ?>
    </body>
</html>