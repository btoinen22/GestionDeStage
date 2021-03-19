<?php

$resultat = $db->prepare("SELECT NOM_ENTREPRISE,ADRESSE_ENTREPRISE,CP_ENTREPRISE, VILLE_ENTREPRISE, TEL_ENTREPRISE,EMAIL_ENTREPRISE,REFUS_ANNEESIO1, REFUS_ANNEE_SIO2 
FROM entreprise;");
$resultat->execute();
// lecture de la première ligne du jeu d'enregistrements
$consult = $resultat->fetchAll();
?>
<?php ?>