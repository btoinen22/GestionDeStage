<?php
include_once "../back_end/db.php";
// include "../middlewares/professeur.php";
// Même problème que sur refuser stage
// Il faut inclure le middleware prof pour éviter un changement par un utilisateur non connecté mais impossible de modifier si je middleware est inclus ???

$id_stage = $_GET['id'];

// Definit l'état du stage sur OK
sql_execute(
    "UPDATE stage
SET ETAT = 'OK'
WHERE ID_stage = :id;
",
    ['id' => $id_stage]
);


header('Location: ../front_end/tdb_professeur.php');
?>
