<?php
    try {
        $entry = $contentfulClient->getEntry('4iBqsIVJm82DftUhiDlQXJ');
    } catch (\Contentful\Core\Exception\NotFoundException $exception) {
        debug_to_console( 'Contentful error: ' . $exception );
    }

    $renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
    <?php renderHead( 'Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich', 'TODO: Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich' ) ?>

    <body>
        <?php include( TEMPLATE_DIR . '/navigation.php') ?>

        <section id="office">
            <div class="container">
                <h2><?php echo $entry->title ?></h2>
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <?php echo nl2br($renderer->render($entry->profil)) ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo '<img src="' . $entry->profilbild->getFile()->getUrl() .'" />'; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php include( TEMPLATE_DIR . '/footer.php') ?>
    </body>
</html>