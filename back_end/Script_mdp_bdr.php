<?php
/* cette page a pour but de chiffrer touts les mots de passes de la bdr*/
include_once 'db.php';

//chiffrage des mdp table etudiant
$req=("SELECT COUNT(ID_ETUDIANT)AS nbLigne FROM etudiant ");
$stmt=$db->prepare($req);
$stmt->execute();
$nbLigne=$stmt->fetch(PDO::FETCH_ASSOC);

//récupération du nombre d'élève


$ligne=0;

while($ligne <= $nbLigne)
{
    
    $ligne=$ligne+1;
    
    $stmt=$db->prepare("SELECT MDP FROM etudiant WHERE id_etudiant=:id");
    $stmt->bindValue(':id',$ligne,PDO::PARAM_INT);
    $stmt->execute();
    $pwd=$stmt->fetch(PDO::FETCH_ASSOC);
    
    //récupération du mot de passe de l'étudiant
    
    $pwdHash=password_hash($pwd['MDP'],PASSWORD_DEFAULT,['cost'=>12]);
    //hashage du mot de passe récupéré précédemment
    
    $stmt=$db->prepare("UPDATE etudiant SET MDP=:pwdHash  WHERE id_etudiant=:id");
    $stmt->bindValue('pwdHash',$pwdHash,PDO::PARAM_STR);
    $stmt->bindValue('id',$ligne,PDO::PARAM_INT);
    $stmt->execute();
    //le mot de passe hasher est renvoyé vers la base 
}


//chiffrage des mdp table professeur
$stmt=$db->prepare("SELECT COUNT(ID_PROF) AS nbLigne FROM professeur ");
$stmt->execute();
$nbLigne2=$stmt->fetch(PDO::FETCH_ASSOC);

//recupération du nombre de professeurs
$ligne1=0;

while ($ligne1 <= $nbLigne2)
{
    $ligne1 =$ligne1 +1;
    $stmt=$db->prepare("SELECT MDP FROM professeur WHERE ID_PROF=:id");
    $stmt->bindValue(':id',$ligne1,PDO::PARAM_INT);
    $stmt->execute();
    $pwd=$stmt->fetch(PDO::FETCH_ASSOC);
    //recupération du mot de passe ligne par ligne

    $pwdHash=password_hash($pwd['MDP'],PASSWORD_DEFAULT,['cost'=>12]);
    //hashage du mot de passe récupéré précédemment

    $stmt=$db->prepare("UPDATE professeur SET MDP=:pwdHash  WHERE ID_PROF=:id");
    $stmt->bindValue('pwdHash',$pwdHash,PDO::PARAM_STR);
    $stmt->bindValue('id',$ligne1,PDO::PARAM_INT);
    $stmt->execute();
    //le mot de passe hasher est renvoyé dans la base
    
}
header('Location:../front_end/lobby.php');
//redirection