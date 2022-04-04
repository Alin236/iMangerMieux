<h2 class="text-center">Accueil</h2>
<p id='id_utilisateur' class='d-none'><?php echo $_SESSION['id_utilisateur'] ?></p>
<div class="row">
    <div class="col-auto">
        <div class="card h-100 shadow">
            <div class="card-header">
                <h3 class="card-title text-center">Moyenne de fruits et légumes</h3>
            </div>
            <div id="countFruitVegetable" class="card-body">
            </div>
            <div class="card-footer">
                <label for='jour'>Jours :</label>
                <input id='jour' value='7'>
            </div>
        </div>
    </div>
    <div class="col-auto">
        <div class="card h-100 shadow">
            <div class="card-header">
                <h3 class="card-title text-center">Analyse journalière</h3>
            </div>
            <div id="dailyAnalysis" class="card-body d-flex justify-content-center">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/graph.js"></script>