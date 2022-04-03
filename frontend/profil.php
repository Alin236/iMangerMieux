<h2>Profil</h2>
<h3>Informations</h3>
<div class="row d-none">
    <div class="col-3">
        <label for="id_utilisateur">ID :</label>
    </div>
    <div class="col">
        <p id="id_utilisateur"><?php echo $_SESSION['id_utilisateur'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <label for="nom">Nom :</label>
    </div>
    <div class="col">
        <p id="nom"><?php echo $_SESSION['nom'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <label for="prenom">Prénom :</label>
    </div>
    <div class="col">
        <p id="prenom"><?php echo $_SESSION['prenom'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <label for="mail">Mail :</label>
    </div>
    <div class="col">
        <p id="mail"><?php echo $_SESSION['mail'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <label for="genre">Genre :</label>
    </div>
    <div class="col">
        <p id="genre"><?php echo $_SESSION['genre'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <label for="date_de_naissance">Date de naissance :</label>
    </div>
    <div class="col">
        <p id="date_de_naissance"><?php echo $_SESSION['date_de_naissance'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col">
        <button id="modifier">Modifier</button>
        <button id="annuler" class="invisible">Annuler</button>
    </div>
</div>
<div class="row">
    <div class="col-3">
    </div>
    <div class="col">
        <button id="deconnecter">Déconnecter</button>
    </div>
</div>

<script type="text/javascript" src="js/profil.js"></script>