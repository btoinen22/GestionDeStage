<?php
/**
 * NR le 24/12/2020
 *  ce fichier permet de créer une démarche quand l'utilisateur est un etudiant
 **/
// Vérification que l'utilisateur a bien saisi les informations attendues
if (isset($_POST['creer_entreprise'])) {

    // Controles des saisies, ne retourne rien si la saisie n'est pas correcte
    $nom = saisieGenerique($_POST['nom']);
    $adresse = saisieGenerique($_POST['adresse']);
    $ville = saisieGenerique($_POST['ville']);
    $cp = saisieCodePostal($_POST['cp']);
    $mail = saisieMail($_POST['courriel']);
    $tel = saisieNumTel($_POST['tel']);

    if (!empty($nom) && !empty($adresse) 
        && !empty($ville) && !empty($cp)
        && !empty($mail)&& !empty($tel)
    ) {
        // préparation de l'enregistrement de l'entreprise avec les valeurs saisies 
        $query = "INSERT INTO entreprise (NOM_ENTREPRISE,ADRESSE_ENTREPRISE, VILLE_ENTREPRISE, CP_ENTREPRISE,EMAIL_ENTREPRISE,TEL_ENTREPRISE) VALUES (:nom,:adresse,:ville,:cp,:email,:tel);";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $stmt->bindValue(':ville', $ville, PDO::PARAM_STR);
        $stmt->bindValue(':cp', $cp, PDO::PARAM_STR);
        $stmt->bindValue(':email', $mail, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
        // protection de la requête par une exception pour afficher à l'utilisateur 
        // un message d'erreur si l'enregistrement n'a pas réussi
        try {
            $execute =$stmt->execute();
            $success = true;
            $message = "L'entreprise a bien été ajoutée.";
            // à la suite de l'actualisation-création de ses démarches, 
            //l'étudiant est renvoyé sur son tableau de bord
            header("Location: ../front_end/lister_creer_entreprises.php");
        }
        // si l'enregistrement n'a pas été effectué , 
        //traitement d'avertissement de l'utilisateur
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }
    } else {
        $success = false;
        $message = "Il y a eu une erreur. Merci de vérifer votre saisie."; // TODO: Message différent suivant champ vide ou problème de saisie ?
    }
} 
?>