<!-- Liste les démarches d'un étudiant. -->
<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Actualiser les démarches ";
require '../includes/header.php';
require '../middlewares/etudiant.php';
require '../back_end/show_data_etudiant.php';
?>

<body>
    <?php require '../includes/barnav.php';
    require 'lister_dern_dem_et.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <button type="button" name="creer_entreprise">
                    <a href="creer_entreprise.php" class="btn btn-block btn-primary btn-lg">Pour créer une démarche avec une entreprise qui n'est pas dans la liste, il faut d'abord créer l'entreprise.</a>
                </button>
            </div>
        </div>
    </div>
<?php require '../includes/footer.php' ?>
</body>
</html>
