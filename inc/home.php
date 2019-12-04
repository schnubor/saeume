<?php
    require( TEMPLATE_DIR . 'renderProject.php' );
    try {
        $projectList = $contentfulClient->getEntry( 'wKIUyMVVYJvtpxspcJvtL' );
    } catch (\Contentful\Core\Exception\NotFoundException $exception) {
        debug_to_console( 'Contentful error: ' . $exception );
    }
?>

<!DOCTYPE html>
<html lang="en">
    <?php renderHead( 'Säum Architekten Berlin | Sanierung und Planung im denkmalgeschützten Bereich', 'Architekturbüro für Umbau, Sanierung und Neubau von Gebäuden für die öffentliche Hand und private Bauträger in Berlin und Brandenburg mit Schwerpunkt Bauen im Bestand und Denkmalschutz.
Alle Leistungsphasen der HOAI von Entwicklung bis Übergabe der Bauvorhaben an den Nutzer.' ) ?>

    <body>
        <?php include( TEMPLATE_DIR . '/navigation.php') ?>

        <section id="projects">
            <div class="container">
                <div class="row tight">
                <?php
                    foreach ($projectList->liste as $project) {
                        renderProject($project);
                    }
                ?>
                </div>
            </div>
        </section>

        <?php include( TEMPLATE_DIR . '/footer.php') ?>
    </body>
</html>