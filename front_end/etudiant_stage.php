<!DOCTYPE html>
<html lang="fr">

<?php
    $title = "Liste des Entreprises";
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    require '../includes/header.php';
   require '../middlewares/etudiant.php';
    // inclusion des fichiers de traitements de données
    require '../back_end/lister_entreprises.php';
    require '../back_end/show_data_gen.php';
    require '../back_end/stage_etud.php';
?>

<body>

    <?php
    require '../includes/barnav.php';
    ?>
        <h5 class="card-title">Liste des Entudiant avec un stage </h5><!-- Page visionner sur sur la page des professeur-->
                                <div class="table-responsives">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">stage</th><!--Information sur les eleves  -->
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- parcours de toutes  les stage de la BDR
                                        et affichages des caractéristiques trouvées
                                        Les professeur pourra voi les etudiant avec stage-->
                                        <?php foreach ($stage as $stage) {
                                            echo' 
                                     <tr>
                                         <td>'. $stage[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $stage['PRENOM_ETUDIANT'].'</td>
                                         <td>'. $stage['ETAT'].'</td>
                                      </tr> 
                         ';
    
                                        } ?><!--recherche des element dans la base de donner-->
                         </tbody>       
                        </table>
            
            </div>
            <h5 class="card-title">Liste des Entudiant sans stage </h5><!--les etudiant sans stage-->
                                <div class="table-responsives">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">stage</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <!-- parcours de toutes  les stage de la BDR
                                        et affichages des caractéristiques trouvées
                                        Les professeur pourra voi les etudiant sans stage-->
                                        <?php foreach ($nstage as $nstage) {
                                            echo' 
                                     <tr>
                                         <td>'. $nstage[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $nstage['PRENOM_ETUDIANT'].'</td>
                                         <td>'. $nstage['ETAT'].'</td>
                                      </tr> 
                         ';
    
                                        } ?><!--parcours des element dans la bdd-->
                         </tbody>       
                        </table>
            
            </div>
            </body>
</html>
