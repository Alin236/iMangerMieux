<?php
    function renderMenuToHTML($currentPageId) {
        // un tableau qui définit la structure du site
        @require_once('var/myMenu.php');
        // Création du menu en insérant l'attribut class=selected au bon endroit
        echo '<nav class="px-3 bg-light"><ul class="nav flex-column flex-md-row nav-fill nav-pills"><li class="nav-item">';
        foreach($myMenu as $pageId => $pageParameters) {
            if($pageId == $currentPageId){
                echo '<a class="nav-link active"';
            }
            else{
                echo '<a class="nav-link"';
            }
            echo " href=\"index.php?page=$pageId\">$pageParameters[0]</a></li>";
        }
        echo '</ul></nav>';
    }
?>