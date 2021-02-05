<?php
/**
 * NR le 24/12/2020
 *  ce fichier permet de créer une démarche quand l'utilisateur est un etudiant
 **/
// Vérification que l'utilisateur a bien saisi les informations attendues
if (isset($_POST['creer_contact'])) {
    if (!empty($_POST['nom_salarie']) && !empty($_POST['prenom_salarie']) 
        && !empty($_POST['courriel'])&& !empty($_POST['tel'])
    ) {
        // préparation de l'enregistrement de l'entreprise avec les valeurs saisies 
        $query = "INSERT INTO salarie (NOM_SALARIE,PRENOM_SALARIE,EMAIL_SALARIE,TEL_SALARIE) VALUES (:nom,:prenom,:email,:tel);";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':nom', $_POST['nom_salarie'], PDO::PARAM_STR);
        $stmt->bindValue(':prenom', $_POST['prenom_salarie'], PDO::PARAM_STR);
        
        $stmt->bindValue(':email', $_POST['courriel'], PDO::PARAM_STR);
        $stmt->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
        // protection de la requête par une exception pour afficher à l'utilisateur 
        // un message d'erreur si l'enregistrement n'a pas réussi
        try {
            $execute =$stmt->execute();
            $success = true;
            $message = "Le contact a bien été ajouté.";
            // à la suite de l'actualisation-création de ses démarches, 
            //l'étudiant est renvoyé sur son tableau de bord
            header("Location: ../front_end/contact_entreprise.php");
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
        $message = "Il faut remplir tous les champs.";
    }
} 
?>