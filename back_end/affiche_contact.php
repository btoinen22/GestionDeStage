<?php 

$resultat = $db->prepare("SELECT NOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE FROM salarie,entreprise WHERE (salarie.ID_ENTREPRISE=entreprise.ID_ENTREPRISE);") ;
$resultat->execute();
// lecture de la première ligne du jeu d'enregistrements
$contact = $resultat->fetchAll();
?>