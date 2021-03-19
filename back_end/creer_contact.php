<?php
if (isset($_POST['creer_contact'])) {

    // Controle des saisies, ne retourne rien si la saisie n'est pas correcte
    $nom = saisieGenerique($_POST['nom']);
    $prenom = saisieGenerique($_POST['prenom']);
    $tel = saisieNumTel($_POST['tel']);
    $email = saisieMail($_POST['email']);

    if (
        !empty($nom) && !empty($prenom)
        && !empty($tel) && !empty($email)
    ) {

        // préparation de l'enregistrement du contact avec les valeurs saisies
        $query = "INSERT INTO SALARIE (ID_ENTREPRISE,NOM_SALARIE,PRENOM_SALARIE,
        TEL_SALARIE,EMAIL_SALARIE) VALUES (:id,:nom,:prenom,:tel,:email);";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);

        try {
            $execute = $stmt->execute();
            $success = true;
            $message = "Le contact a bien été ajoutée.";
            // à la suite de l'actualisation-création de ses démarches,
            //l'étudiant est renvoyé sur son tableau de bord
            header("lister_creer_entreprises.php");
        }
        // si l'enregistrement n'a pas été effectué ,
        //traitement d'avertissement de l'utilisateur
        catch (Exception $e) {
            $message = $e;
            $success = false;
            $message = "pas d'ajout.";
        }
    } else {
        $success = false;
        $message = "Il y a eu une erreur. Merci de vérifer votre saisie."; // TODO: Message différent suivant champ vide ou problème de saisie ?
    }
}
