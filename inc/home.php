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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <h1>Home</h1>

    <?php
        foreach ($projects as $project) {
            echo '<a href="/project/' . $project->getId() . '">' . $project->headline . '</a>';
        }
    ?>
</body>
</html>