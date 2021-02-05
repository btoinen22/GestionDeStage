<?php
include_once "../back_end/db.php";
include "../middlewares/professeur.php";

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
