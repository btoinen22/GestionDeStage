<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Mon profil";
    require '../includes/header.php';
    require '../middlewares/etudiant.php';
    require '../back_end/modifier_profil.php';
    require '../back_end/show_data_gen.php';
?>

<body>
    <?php require '../includes/barnav.php'; ?>


    <div class="lime-container">
        <div class="lime-body">
            <div class="container">

                <div class="row">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Modifier mon Profil</h5>
                                <p>Renseignez vos informations personnelles pour le bon fonctionnement de l'application.
                                </p>
                                <form method="POST" id="modifier_profil">
                                    <div class="form-row mt-5">
                                        <div class="form-group col-md-6">
                                            <label for="Nom">Nom de l'étudiant</label>
                                            <input type="text" class="form-control" id="nom" name="nom"
                                                value="<?php echo($nom); ?>" placeholder="Ex: Doe">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="prenom">Prénom de l'étudiant</label>
                                            <input type="text" class="form-control" id="prenom" name="prenom"
                                                value="<?php echo($prenom); ?>" placeholder="Ex: John">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="email">Adresse Email de l'étudiant</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="<?php echo($email); ?>"
                                                placeholder="Ex: nom.prenom@mail.com">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="telephone">Téléphone de l'étudiant</label>
                                            <input type="text" class="form-control" id="telephone" name="telephone"
                                                value="<?php echo($telephone); ?>"
                                                placeholder="Ex: +33123456789">
                                        </div>
                                    </div>
                                    <button type="submit" id="modifier_profil" name="modifier_profil"
                                        class="btn btn-primary">Modifier</button>
                                </form>
                                <div class="mt-4">
                                    <?php if ($show == true) {
                                        echo '
                                    <p class="text-'.$color.'">'.$message.'</p>
                                    ';
    
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Modifier mon Mot de Passe</h5>
                                <p>Ne donnez jamais votre mot de passe à qui que ce soit.</p>
                                <form method="POST" id="modifier-mdp">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="motdepasse">Mot de passe</label>
                                            <input type="password" class="form-control" id="motdepasse"
                                                name="motdepasse" placeholder="Ex: ************">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="motdepassec">Confirmation du mot de passe</label>
                                            <input type="password" class="form-control" id="motdepassec"
                                                name="motdepassec" placeholder="Ex: ************">
                                        </div>
                                    </div>
                                    <button type="submit" id="modifier-mdp" name="modifier-mdp"
                                        class="btn btn-primary">Modifier</button>
                                </form>
                                <div class="mt-4">
                                    <?php if ($showMdp == true) {
                                        echo '
                                    <p class="text-'.$colorMdp.'">'.$messageMdp.'</p>
                                    ';
                                
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php require '../includes/footer.php' ?>
</body>
</html>
