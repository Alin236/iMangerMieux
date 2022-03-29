<?php
    require_once('template_header.php');
?>
    <div class="container">
        <div class="columnMenu">
            <?php
                require_once('template_menu.php');
                $currentPageId = 'accueil';
                if(isset($_GET['page'])){
                    $currentPageId = $_GET['page'];
                    if($currentPageId == 'index')
                        $currentPageId = 'accueil';
                }
                renderMenuToHTML($currentPageId);
            ?>
        </div>
        <section class="contenu">
            <?php
                $pageToInclude = "$currentPageId.php";
                if(is_readable($pageToInclude))
                    require_once($pageToInclude);
                else
                    require_once("error.php");
            ?>
        </section>
    </div>
<?php require_once('template_footer.php')?>
