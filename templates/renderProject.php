<?php
    function renderProject($project) {
        echo '<div class="col-md-4">';
        echo '<a href="/project/' . $project->getId() . '">';
        echo '<div class="project">';
        echo '<img class="preview" src="' . $project->pictures[0]->getFile()->getUrl() . '">';
        echo '</div>';
        echo '</a>';
        echo '<p class="subtitle">' . $project->headline . '</p>';
        echo '</div>';
    }
?>