<!--   EC le 31/01/2021
// Ce fichier affiche toutes les démarches d'un étudiant pour un professeur.
// Il sera inclu en cliquant sur le bouton "Voir" a côté des démarches, ainsi que sur des démarches spécifiques.
-->
<?php
function demarches($id_etudiant, $db)
{

    // connaitre une démarche nécessite  non seulement de connaitre ces caractéristiques
    // mais aussi les caractéristiques de l'entreprise et les moyens de comm utilsés
    // et le salarié contacté au sein de l'entreprise
    $stmt = $db->prepare(
        "SELECT DATE_DEMARCHE, NOM_ENTREPRISE,VILLE_ENTREPRISE, NOM_SALARIE, 
           TEL_SALARIE ,COMMENTAIRE, LIBELLE_MOYEN, ID_ETUDIANT, ID_DEMARCHE
        FROM salarie,demarche,entreprise,moyencom 
        WHERE MOYENCOM.ID_MOYEN=DEMARCHE.ID_MOYEN AND 
              DEMARCHE.ID_SALARIE=SALARIE.ID_SALARIE AND
            ENTREPRISE.ID_ENTREPRISE= SALARIE.ID_ENTREPRISE AND 
            DEMARCHE.ID_ETUDIANT=:id 
        ORDER BY DATE_DEMARCHE  DESC"
    );
    $stmt->bindValue(':id', $id_etudiant, PDO::PARAM_INT);
    $stmt->execute();
    $demarches = $stmt->fetchAll(PDO::FETCH_BOTH);

    $stmt = $db->prepare(
        "SELECT ID_ETUDIANT, PRENOM_ETUDIANT, NOM_ETUDIANT 
        FROM etudiant 
        WHERE ETUDIANT.ID_ETUDIANT=:id"
    );
    $stmt->bindValue(':id', $id_etudiant, PDO::PARAM_INT);
    $stmt->execute();
    $etudiant = $stmt->fetchAll(PDO::FETCH_BOTH)[0];

    return [$demarches, $etudiant];
}

function demarcheSpecifique($id_demarche, $id_etudiant, $db)
{
    // connaitre une démarche nécessite  non seulement de connaitre ces caractéristiques
    // mais aussi les caractéristiques de l'entreprise et les moyens de comm utilsés
    // et le salarié contacté au sein de l'entreprise
    $stmt = $db->prepare(
        "SELECT ENTREPRISE.ID_ENTREPRISE, NOM_ENTREPRISE,VILLE_ENTREPRISE, NOM_SALARIE, 
            TEL_SALARIE,DATE_DEMARCHE,COMMENTAIRE,LIBELLE_MOYEN, ADRESSE_ENTREPRISE, 
            CP_ENTREPRISE, TEL_ENTREPRISE, EMAIL_ENTREPRISE, PRENOM_SALARIE,
            EMAIL_SALARIE, LIBELLE_MOYEN
        FROM salarie,demarche,entreprise,moyencom 
        WHERE MOYENCOM.ID_MOYEN=DEMARCHE.ID_MOYEN AND 
              DEMARCHE.ID_SALARIE=SALARIE.ID_SALARIE AND
            ENTREPRISE.ID_ENTREPRISE= SALARIE.ID_ENTREPRISE AND 
            DEMARCHE.ID_DEMARCHE=:id"
    );
    $stmt->bindValue(':id', $id_demarche, PDO::PARAM_INT);
    $stmt->execute();
    $demarcheSpe = $stmt->fetchAll(PDO::FETCH_BOTH);

    $stmt = $db->prepare(
        "SELECT ID_ETUDIANT, PRENOM_ETUDIANT, NOM_ETUDIANT 
        FROM etudiant 
        WHERE ETUDIANT.ID_ETUDIANT=:id"
    );
    $stmt->bindValue(':id', $id_etudiant, PDO::PARAM_INT);
    $stmt->execute();
    $etudiant = $stmt->fetchAll(PDO::FETCH_BOTH)[0];

    // Retourne un array qui contient a la fois les données de l'étudiant et les données de la démarche
    // Possibilité de simplifier ?
    return [$demarcheSpe, $etudiant];
}
?>
