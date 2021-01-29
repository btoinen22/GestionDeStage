<?php 

$resultat = $db->prepare("SELECT * FROM etudiant,professeur,demarche,specialite,moyencom 
WHERE specialite.ID_SPECIALITE=professeur.ID_SPECIALITE 
AND specialite.ID_SPECIALITE=etudiant.ID_SPECIALITE
AND demarche.ID_ETUDIANT=etudiant.ID_ETUDIANT;");
$resultat->execute();
// lecture de la première ligne du jeu d'enregistrements
$demspe = $resultat->fetchAll();
?>