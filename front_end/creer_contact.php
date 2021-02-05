<!--   NR le 24/12/2020
//  Ce fichier comporte les afichages de la page de création 
//  d'une entreprise par un étudiant 
// Comme tout fichier d'affichage, il comporte des réutilisations 
//de la définition du header et du footer
-->
<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Créer un nouveau contact";
     // inclusion des fichiers hedaer, tt du type d'utilisateur
    include_once '../includes/header.php';
    include_once '../middlewares/etudiant.php';
     // inclusion des fichiers de traitements de données
    include_once '../back_end/creer_contact.php';
?>

<body>
<?php
    include_once '../includes/barnav.php';
?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nouveau contact</h5>
                                <div class="mt-4">
                                            <!-- préparation de l'affichage des erreurs
                                            après soumission-->
                                    <?php if(isset($success)) {
                                    echo '<p class="text-'.($success == true ? 'success' : 'danger').'">'.$message.'</p>';
                                }
                                ?>
                                </div>
                                <!-- affichage du formulaire :
                                     - saisie des caractéristiques de lentreprise, toutes sont obligatoires
                                     - sauf le contact à saisir dans une autre page, fonctionnalité non codée
                                      -->
                                <form method="POST" id="creer_contact" name="creer_contact" class="mt-4">
                                    <div class="form-group">
                                        <label for="nom">Nom du salarié</label>
                                        <input type="text" class="form-control" id="nom_salarie"  name="nom_salarie"  maxlength="32"   required>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label for="prenom">prénom du salarié</label>
                                        <input type="text" class="form-control"   id="prenom_salarie"  name="prenom_salarie" maxlength="32" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="courriel">courriel du salarié</label>
                                        <input type="email" class="form-control " id="courriel"  name="courriel" size="32" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">téléphone du salarié</label>
                                        <input type="tel"  id="tel"  name="tel" maxlength="10" size="10" required >
                                    </div>
                                    
                                    
                                    <div class="mt-3">
                                        <button type="submit" name="creer_contact" id="creer_contact"
                                            class="btn btn-block btn-primary btn-lg">Soumettre</button>
                                    </div>
                                </form>
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
    </div>
    </div>

    <?php include '../includes/footer.php' ?>

</body>

</html>