<?php
try {
    $entry = $contentfulClient->getEntry('4iBqsIVJm82DftUhiDlQXJ');
} catch (\Contentful\Core\Exception\NotFoundException $exception) {
    debug_to_console('Contentful error: ' . $exception);
}

$renderer = new \Contentful\RichText\Renderer();
?>

<!DOCTYPE html>
<html lang="en">
<?php renderHead('Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich', 'TODO: Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich') ?>

<body>
    <?php include(TEMPLATE_DIR . '/navigation.php') ?>

    <section id="office">
        <div class="container">
            <div class="row align-items-center" id="profil">
                <div class="col-md-6">
                    <h2><?php echo $entry->title ?></h2>
                    <?php echo nl2br($renderer->render($entry->profil)) ?>
                </div>
                <div class="col-md-6">
                    <?php echo '<img src="' . $entry->profilbild->getFile()->getUrl() . '" />'; ?>
                </div>
            </div>

            <hr class="divider">

            <div class="row align-items-center" id="team">
                <div class="col-md-6">
                    <?php echo '<img src="' . $entry->portraitbild->getFile()->getUrl() . '" />'; ?>
                </div>
                <div class="col-md-6">
                    <h2>Dortje Säum</h2>
                    <?php echo nl2br($renderer->render($entry->portrait)) ?>
                </div>
            </div>

            <hr class="divider">

            <div class="row" id="leistungen">
                <div class="col-md-12">
                    <div class="list">
                        <h2>Leistungen</h3>
                        <?php echo nl2br($renderer->render($entry->leistungen)) ?>
                    </div>
                </div>
            </div>

            <hr class="divider">

            <div class="row" id="technik">
                <div class="col-md-6">
                        <div class="list">
                            <h2>Technik</h3>
                            <?php echo nl2br($renderer->render($entry->technik)) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include(TEMPLATE_DIR . '/footer.php') ?>
</body>

</html> 