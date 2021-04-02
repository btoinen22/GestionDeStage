<?php

/*cette page sert à l'arret des démarches avec une entreprise par l'etudiant
on modifie donc les valeurs de Refus années sio1 et sio2 en fonction de la classe de l'élève*/ 


include_once 'db.php';


//récupération de l'id de l'etudiant
session_start();
$id_et=$_SESSION['id'];

//récuperation de l'id de la classe
$req='SELECT ID_CLASSE FROM etudiant WHERE ID_ETUDIANT=:id_et';
$stmt=$db->prepare($req);
$stmt->bindValue(':id_et', $id_et, PDO::PARAM_INT);
$id_classe=$stmt->execute();
if (!$id_classe){echo "la récupération à échoué";} //verification de la bonne récupération de l'id

//recherche de l'id de l'entreprise
$id_ent=$_GET['id'];

//actualisation de la colonne annee sio 1
if ($id_classe==1){
 
    $query = 'UPDATE entreprise SET REFUS_ANNEESIO1=TRUE WHERE ID_ENTREPRISE=:id_ent';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_ent', $id_ent, PDO::PARAM_INT);
        
        try {
            $execute =$stmt->execute();
            $success = true;
            $message = "l'arret des démarches à été pris en compte";
            
            // à la suite de l'actualisation-création de ses démarches, 
            //l'étudiant est renvoyé a la page des démarches
            header('Location:../front_end/lister_demarches.php' );
        }
        
        // si l'enregistrement n'a pas été effectué , 
            //traitement d'avertissement de l'utilisateur
            catch    (Exception $e){
                $message =$e;
                $success = false;
                $message ="l'arrêt des démarches à échoué";
                
            }
}
//actualisation de la valeur de la colonne annee sio 2 
elseif ($id_classe==2){
    
    $query = 'UPDATE entreprise SET REFUS_ANNEE_SIO2=TRUE WHERE ID_ENTREPRISE=:id_ent';
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id_ent', $id_ent, PDO::PARAM_INT);
        
        try {
            $execute =$stmt->execute();
            $success = true;
            $message = "l'arret des démarches à été pris en compte";
            
            // à la suite de l'actualisation-création de ses démarches, 
            //l'étudiant est renvoyé a la page des démarches
            header('Location:../front_end/lister_demarches.php' );
        }
        
        // si l'enregistrement n'a pas été effectué , 
            //traitement d'avertissement de l'utilisateur
            catch    (Exception $e){
                $message =$e;
                $success = false;
                $message ="l'arrêt des démarches à échoué";
                
            }
}

