<h2>Accueil</h2>
<p id='id_utilisateur' class='d-none'><?php echo $_SESSION['id_utilisateur'] ?></p>
<p id='jour' class='d-none'>7</p>
<div class="card-deck">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-center">Moyenne de fruits et légumes</h3>
        </div>
        <div id="countFruitVegetable" class="card-body">
        </div>
    </div>
</div>

<script type="text/javascript" src="js/graph.js"></script>