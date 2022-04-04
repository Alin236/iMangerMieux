<?php
    require_once('template_header.php');
    require_once('template_menu.php');
    $currentPageId = 'accueil';
    if(isset($_SESSION['id_utilisateur'])){
        if(isset($_GET['page'])){
            $currentPageId = $_GET['page'];
            if($currentPageId == 'index')
                $currentPageId = 'accueil';
        }
    }
    else{
        $currentPageId = 'authenticate';
    }
    renderMenuToHTML($currentPageId);
?>
    <section class="container-fluid px-3">
        <?php
            $pageToInclude = "$currentPageId.php";
            if(is_readable($pageToInclude))
                require_once($pageToInclude);
            else
                require_once("error.php");
        ?>
    </section>
    
<?php require_once('template_footer.php')?>
