<?php

$resultat = $db->prepare(
    "SELECT NOM_ETUDIANT,PRENOM_ETUDIANT,ETAT FROM etudiant, stage 
WHERE etudiant.ID_ETUDIANT=stage.ID_ETUDIANT AND ETAT='OK';"
);
$resultat->execute();
// lecture de la première ligne du jeu d'enregistrements
$stage = $resultat->fetchAll();
?>

<?php

$resultat = $db->prepare(
    "SELECT NOM_ETUDIANT,PRENOM_ETUDIANT,ETAT FROM etudiant, stage 
WHERE etudiant.ID_ETUDIANT=stage.ID_ETUDIANT AND ETAT='AT';"
);
$resultat->execute();
// lecture de la première ligne du jeu d'enregistrements
$nstage = $resultat->fetchAll();

