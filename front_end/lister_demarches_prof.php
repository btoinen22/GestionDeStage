<!--   EC le 31/01/2021
// Ce fichier affiche toutes les démarches d'un étudiant pour un professeur.
// Il sera inclu en cliquant sur le bouton "Voir" a côté des démarches.
-->
<!DOCTYPE html>
<html lang="fr">

<?php
include '../includes/header.php';
include '../middlewares/professeur.php';
include '../back_end/show-dem-prof.php';

$d = demarches($_GET["id"], $db);
$demarches = $d[0];
$etudiant = $d[1][0];
$title = "Démarches de " . $etudiant; // Buggé, à réparer

?>

<body>
  <?php include '../includes/barnav.php'; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Dernières démarches réalisées par <?php echo $etudiant; ?></h5>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Date démarche</th>
                  <th scope="col">Nom entreprise</th>
                  <th scope="col">Ville entreprise</th>
                  <th scope="col">nom du contact</th>
                  <th scope="col">tel du contact</th>
                  <th scope="col">moyen de communication</th>
                  <th scope="col">commentaire</th>
                  <th scope="col">Actions</th>
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
                                            <a href="creer_demarche.php?id=' . $row['ID_ENTREPRISE'] . '" <span class="badge badge-success">Actualiser</span></a>
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
  <?php include '../includes/footer.php' ?>
</body>

</html>
