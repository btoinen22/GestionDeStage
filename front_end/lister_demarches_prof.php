<!--   EC le 31/01/2021
// Ce fichier affiche toutes les démarches d'un étudiant pour un professeur.
// Il sera inclu en cliquant sur le bouton "Voir" a côté des démarches.
-->
<!DOCTYPE html>
<html lang="fr">

<?php
$title = "Démarches d'un étudiant";
include '../includes/header.php';
include '../middlewares/professeur.php';
include '../back_end/show_dem_prof.php';

// Retourne une liste de deux requêtes : la première contient les entreprises, la deuxième l'étudiant.
// On les assigne chacun a des variables
$requete = demarches($_GET["id"], $db);
$demarches = $requete[0];
$nomEtudiant = $requete[1]["PRENOM_ETUDIANT"] . " " . $requete[1]["NOM_ETUDIANT"];
?>

<body>
    <?php include '../includes/barnav.php'; ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Dernières démarches réalisées par <?php echo $nomEtudiant; ?></h5>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Date démarche</th>
                                    <th scope="col">Nom entreprise</th>
                                    <th scope="col">Ville entreprise</th>
                                    <th scope="col">Nom du contact</th>
                                    <th scope="col">Tel du contact</th>
                                    <th scope="col">Moyen de communication</th>
                                    <th scope="col">Commentaire</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- parcours des démarches issues de la BDR
                            et affichages des caractéristiques trouvées-->
                                <?php
                foreach ($demarches as $row) {
                    echo ' 
                                    <tr>
                                        <td>' . join('-', array_reverse(explode('-', substr($row['DATE_DEMARCHE'], 0, 10)))) . '</td>
                                        <td>' . $row['NOM_ENTREPRISE'] . '</td>
                                        <td>' . $row['VILLE_ENTREPRISE'] . '</td>
                                        <td>' . $row['NOM_SALARIE'] . '</td>
                                        <td>' . $row['TEL_SALARIE'] . '</td>
                                        <td>' . $row['LIBELLE_MOYEN'] . '</td>
                                        <td>' . $row['COMMENTAIRE'] . '</td>
                                        <td>
                                        <a href="../contact_entreprise_prof.php?id='.$row["ID_ETUDIANT"].'&dem=' . $row['ID_DEMARCHE'] . '" ><span class="badge badge-success">Voir</span></a>
                                        </td>
                                    </tr> 
                                ';
                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include '../includes/footer.php' ?>
</body>
</html>