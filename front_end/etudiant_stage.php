<!DOCTYPE html>
<html lang="fr">

<?php 
    $title = "Liste des Entreprises";    
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    include '../includes/header.php';   
   include '../middlewares/etudiant.php';  
    // inclusion des fichiers de traitements de données   
    include '../back_end/lister_entreprises.php'; 
    include '../back_end/show-data_gen.php';
    include '../back_end/stage_etud.php';    
    ?>

<body>

    <?php 
    include '../includes/barnav.php'; 
    ?>
		<h5 class="card-title">Liste des Entudiant avec un stage </h5>
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
                                        <!-- parcours de toutes  les entrepreises de la BDR
                                        et affichages des caractéristiques trouvées
                                        L'utilisateur pourra choisir l'ent pour créer
                                        la démarche de recherche effectuée auprès d'elle-->
                                        <?php foreach ( $stage as $stage) { 
                            echo' 
                                     <tr>
                                         <td>'. $stage[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $stage['PRENOM_ETUDIANT'].'</td>
                                         <td>'. $stage['ETAT'].'</td>
                                      </tr> 
                         '; 
                          } ?>
                         </tbody>       
                        </table>
            
            </div>
            <h5 class="card-title">Liste des Entudiant sans stage </h5>
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
                                        <!-- parcours de toutes  les entrepreises de la BDR
                                        et affichages des caractéristiques trouvées
                                        L'utilisateur pourra choisir l'ent pour créer
                                        la démarche de recherche effectuée auprès d'elle-->
                                        <?php foreach ( $nstage as $nstage) { 
                            echo' 
                                     <tr>
                                         <td>'. $nstage[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $nstage['PRENOM_ETUDIANT'].'</td>
                                         <td>'. $nstage['ETAT'].'</td>
                                      </tr> 
                         '; 
                          } ?>
                         </tbody>       
                        </table>
            
            </div>
            </body>
</html>