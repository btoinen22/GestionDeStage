<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Démarches d'un élève";
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    require '../includes/header.php';
    require '../middlewares/professeur.php';
   
    $idEtudiant = $_GET["id"];
    $idDemarche = $_GET["dem"];

    // On récupère la démarche, ainsi que les données de l'étudiant a partir des IDs
    require "../back_end/show-dem-prof.php";
    
    $requete = demarcheSpecifique($idDemarche, $idEtudiant, $db);
    $demarche = $requete[0][0];
    $etudiant = $requete[1][0];
?>

<body>
    <?php
    include '../includes/barnav.php';
    ?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contact d'une entreprise</h5>
                                <div class="mt-4">

                                    <?php if (isset($success)) {
        echo '<p class="text-'.($success == true ? 'success' : 'danger').'">'.$message.'</p>';
    } ?>
                                </div>
                                <div class="card">
                                    <!-- Présentation a retravailler ? -->
                                    <p class="card-title">Entreprise choisie</p>
                                    <div class="card-body">
                                        <p class="card-text">Nom de l'entreprise :
                                            <?php echo $demarche['NOM_ENTREPRISE'];?></p>
                                        <p class="card-text">Adresse de l'entreprise :
                                            <?php echo $demarche['ADRESSE_ENTREPRISE'];?></p>
                                        <p class="card-text">
                                            <?php echo $demarche['CP_ENTREPRISE'].' '.$demarche['VILLE_ENTREPRISE'];?>
                                        </p>
                                        <p class="card-text">Teléphone : <?php echo $demarche['TEL_ENTREPRISE'];?></p>
                                        <p class="card-text"> Courriel : <?php echo $demarche['EMAIL_ENTREPRISE'];?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">Nom du salarié : <?php echo $demarche["NOM_SALARIE"] ?>
                                            <?php echo $demarche["PRENOM_SALARIE"] ?></p>
                                        <p class="card-text">Courriel du salarié :
                                            <?php echo $demarche["EMAIL_SALARIE"] ?></p>
                                        <p class="card-text">Téléphone du salarié :
                                            <?php echo $demarche["TEL_SALARIE"] ?></p>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">Date de la démarche :
                                            <?php echo $demarche["DATE_DEMARCHE"] ?> </p>
                                        <p class="card-text">Commentaire : <?php echo $demarche["COMMENTAIRE"] ?></p>
                                        <p class="card-text">Moyen de communication :
                                            <?php echo $demarche["LIBELLE_MOYEN"] ?></p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <a class="btn btn-block btn-primary btn-lg"
                                        href="./lister_demarches_prof.php?id=<?php echo $idEtudiant ?>">
                                        Retourner a la liste des démarches</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="lime-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <span class="footer-text">2020 © iStage</span>
                </div>
            </div>
        </div>
    </div>


    <?php include '../includes/footer.php' ?>
</body>

</html>