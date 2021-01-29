<!DOCTYPE html>
<html lang="fr">

<?php 
    $title = "Liste des Entreprises";    
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    include '../includes/header.php';   
   include '../middlewares/etudiant.php';  
    // inclusion des fichiers de traitements de données   
    include '../back_end/consultation_entreprise.php'; 
    include '../back_end/show-data_gen.php'; 
    ?>

<body>

    <?php 
    include '../includes/barnav.php'; 
    ?>
		<h5 class="card-title">Liste des entreprises </h5>
                                <div class="table-responsives">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prenom</th>
                                                <th scope="col">stage</th>
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
                                        <?php foreach ( $consult as $consult) { 
                            echo' 
                                     <tr>
                                         <td>'. $consult[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $consult[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $consult[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $consult[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $consult[ 'NOM_ETUDIANT'].'</td>
                                         <td>'. $consult[ 'NOM_ETUDIANT'].'</td>
                                      </tr> 
                         '; 
                          } ?>
                         </tbody>       
                        </table>
            
            </div>