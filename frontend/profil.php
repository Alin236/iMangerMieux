<h2>Profil</h2>
<h3>Informations</h3>
<div class="row">
    <div class="col-2">
        <label for="nom">Nom :</label>
    </div>
    <div class="col">
        <p id="nom"><?php echo $_SESSION['nom'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="prenom">Prénom :</label>
    </div>
    <div class="col">
        <p id="prenom"><?php echo $_SESSION['prenom'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="mail">Mail :</label>
    </div>
    <div class="col">
        <p id="mail"><?php echo $_SESSION['mail'] ?></p>
    </div>
</div>
<div class="row">
    <div class="col-2">
        <label for="date_de_naissance">Date de naissance :</label>
    </div>
    <div class="col">
        <p id="date_de_naissance"><?php echo $_SESSION['date_de_naissance'] ?></p>
    </div>
</div>
