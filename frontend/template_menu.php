<?php
    function renderMenuToHTML($currentPageId, $currentLeng) {
        // un tableau qui définit la structure du site
        @require_once('var/myMenu.php');
        // Création du menu en insérant l'attribut class=selected au bon endroit
        echo '<nav class="menu"><ul>';
        foreach($myMenu as $pageId => $pageParameters) {
            echo '<li';
            if($pageId == $currentPageId){
                echo ' class="selected"';
            }
            echo "><a href=\"index.php?page=$pageId&leng=$currentLeng\">$pageParameters[0]</a></li>";
        }
        echo '</ul></nav>';
    }
?>