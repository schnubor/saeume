<?php
require_once(realpath(dirname(__FILE__) . "/../resources/config.php"));
require_once(LIBRARY_PATH . "/templateFunctions.php");

$currentPage = "Usage";
?>

<!DOCTYPE html>
<html>
    <?php renderHead(
        "PHP Boilerplate - Usage",
        "How to use PHP Boilerplate."
    ); ?>
    <body>
        <?php require_once(TEMPLATES_PATH . '/header.php'); ?>
        <?php require_once(TEMPLATES_PATH . '/navigation.php'); ?>

        <div class="container">
            <h1>Usage</h1>

            <p class="lead">
                This an example site. For a full description on how to use please refer to the
                <a href="https://github.com/schnubor/php-boilerplate/blob/master/README.md" target="_blank" title="Readme.md">README on Github</a>.
            </p>
        </div>

        <?php require_once(TEMPLATES_PATH . '/footer.php'); ?>
    </body>
</html>
