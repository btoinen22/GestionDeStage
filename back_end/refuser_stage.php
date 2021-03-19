<?php
include_once "../back_end/db.php";
session_start(); // Obligatoire car on inclue pas le header qui initialise normalement la session
include "../middlewares/professeur.php";

$id_stage = $_GET['id'];

// Definit l'état du stage sur RE (refus)
sql_execute(
    "UPDATE stage
    SET ETAT = 'RE'
    WHERE ID_stage = :id;
",
    ['id' => $id_stage]
);

header('Location: ../front_end/tdb_professeur.php');
