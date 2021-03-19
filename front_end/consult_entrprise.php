<!DOCTYPE html>
<html lang="fr">

<?php
    $title = "Liste des Entreprises";
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    require '../includes/header.php';
   require '../middlewares/etudiant.php';
    // inclusion des fichiers de traitements de données
    require '../back_end/consultation_entreprise.php';
    require '../back_end/show_data_gen.php';
?>

<body>
<!--Page plus bonne identique a page lister_creer_entreprise-->
    <?php
    require '../includes/barnav.php';
    ?>
        <h5 class="card-title">Liste des entreprises que vous pouvez consulter</h5>
                                <div class="table-responsives">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom Entreprise</th>
                                                <th scope="col">L'adresse de l'entreprise</th>
                                                <th scope="col">Code postal</th>
                                                <th scope="col">Ville de l'entreprise</th>
                                                <th scope="col">telephone de l'entreprise </th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Refus 1er anner</th>
                                                <th scope="col">Refus 2e année</th>
                                                <th scope="col">action</th>                                     
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- parcours de toutes  les entrepreises de la BDR
                                        et affichages des caractéristiques trouvées
                                        L'utilisateur pourra choisir l'ent pour créer
                                        la démarche de recherche effectuée auprès d'elle-->
                                       <!-- la class="table danger"permet de mettre en rouge les ligne quand la valeur est une fois a 1 ,entreprise ne prend plus de stagiaire-->
                                        <?php foreach ($consult as $consult) {
                                            if ($consult['REFUS_ANNEESIO1']|| $consult['REFUS_ANNEE_SIO2']==1) {
                                                echo' 
                                     <tr class="table-danger">
                                         <td>'. $consult[ 'NOM_ENTREPRISE'].'</td>
                                         <td>'. $consult[ 'ADRESSE_ENTREPRISE'].'</td>
                                         <td>'. $consult[ 'CP_ENTREPRISE'].'</td>
                                         <td>'. $consult[ 'VILLE_ENTREPRISE'].'</td>
                                         <td>'. $consult[ 'TEL_ENTREPRISE'].'</td>
                                         <td>'. $consult[ 'EMAIL_ENTREPRISE'].'</td>
                                         <td>'. $consult[ 'REFUS_ANNEESIO1'].'</td>
                                         <td>'. $consult[ 'REFUS_ANNEE_SIO2'].'</td>
                                      </tr> 
                         ';
        
                                            } else {
                                                        echo'
                                <tr >  
                                    <td>'. $consult[ 'NOM_ENTREPRISE'].'</td>
                                    <td>'. $consult[ 'ADRESSE_ENTREPRISE'].'</td>
                                    <td>'. $consult[ 'CP_ENTREPRISE'].'</td>
                                    <td>'. $consult[ 'VILLE_ENTREPRISE'].'</td>
                                    <td>'. $consult[ 'TEL_ENTREPRISE'].'</td>
                                    <td>'. $consult[ 'EMAIL_ENTREPRISE'].'</td>
                                    <td>'. $consult[ 'REFUS_ANNEESIO1'].'</td>
                                    <td>'. $consult[ 'REFUS_ANNEE_SIO2'].'</td>
                                    
                                </tr>
                            ';
        
                                            }
    
                                        }
                          
                          
                          
                                        ?>
                         </tbody>       
                        </table>

            </div>
