<?php
require_once 'db.php';


//récupération de l'id de l'etudiant
session_start();
$id_et=$_SESSION['id'];

//récuperation de l'id de la classe
$req='SELECT ID_CLASSE FROM etudiant WHERE ID_ETUDIANT="'.$id_et.'"';
$result=$db->query($req);
if (!$result) {
    echo "la récupération à échoué";
} //verification que l'id est bien récupéré
$id_classe=($result->fetch(PDO::FETCH_ASSOC));

$id_cl=$id_classe['ID_CLASSE']; //echo $id_cl; //passage de valeur de l'id de la classe de PDO a INT

//recherche de l'id de l'entreprise
$id_ent=$_GET['id'];



//actualisation de la colonne annee sio 1
if ($id_cl==1) {
    $query = 'UPDATE entreprise SET REFUS_ANNEESIO1=TRUE WHERE ID_ENTREPRISE="'.$id_ent.'"';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
    try {
        $execute =$stmt->execute();
        $success = true;
        $message = "l'arret des démarches à été pris en compte";
            
        // à la suite de l'actualisation-création de ses démarches,
        //l'étudiant est renvoyé a la page des démarches
        header('Location:../front_end/lister_demarches.php');
    }
        
    // si l'enregistrement n'a pas été effectué ,
    //traitement d'avertissement de l'utilisateur
    catch (Exception $e) {
        $message =$e;
        $success = false;
        $message ="l'arrêt des démarches à échoué";
    }
}
//actualisation de la valeur de la colonne annee sio 2
elseif ($id_cl==2) {
    $query = 'UPDATE entreprise SET REFUS_ANNEE_SIO2=TRUE WHERE ID_ENTREPRISE="'.$id_ent.'"';
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        
    try {
        $execute =$stmt->execute();
        $success = true;
        $message = "l'arret des démarches à été pris en compte";
            
        // à la suite de l'actualisation-création de ses démarches,
        //l'étudiant est renvoyé a la page des démarches
        header('Location:../front_end/lister_demarches.php');
    }
        
    // si l'enregistrement n'a pas été effectué ,
    //traitement d'avertissement de l'utilisateur
    catch (Exception $e) {
        $message =$e;
        $success = false;
        $message ="l'arrêt des démarches à échoué";
    }
}
