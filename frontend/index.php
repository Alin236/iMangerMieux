<?php 
    $currentLeng = 'fr';
    if(isset($_GET['leng']))
        $currentLeng = $_GET['leng'];
    require_once('template_header.php');
    myHeader($currentLeng);
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
                renderMenuToHTML($currentPageId, $currentLeng);
            ?>
        </div>
        <section class="contenu">
            <?php
                $pageToInclude = "$currentLeng/$currentPageId.php";
                if(is_readable($pageToInclude))
                    require_once($pageToInclude);
                else
                    require_once("$currentLeng/error.php");
            ?>
        </section>
    </div>
<?php require_once('template_footer.php')?>
