<div class="container-fluid">
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-12">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="dashboard-info row">
                            <div class="info-text col-md-6">
                                <h3 class="card-title">Bonjour <?php echo($_SESSION['prenom']) ?> !</h3>
                                <?php if ($_SESSION['rank']=='professeur') {
                                    echo '
                                        <p>Cette application permet de réaliser le suivi des recherches de stage,l\'attribution des stages et les visites de stage.</p>
                                        <p>Elle recense tous les étudiants et toutes les entreprises pouvant acceuillir des stagiaires.</p>';
                                } else {
                                    echo ' <p>Retrouve  les entreprises pouvant accueuillir des stagiaires et enregistre tes démarches.</p>';
                                }?>
                            </div>
                            <div class="info-image col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title"><a href="../front_end/etudiant_stage.php">Etudiants avec Stage</a></h5>
                    <h2 class="float-right"><?php echo($countEtudiantStage ." / ". $countEtudiants); ?></h2>
                    <?php $percent = $countEtudiantStage / $countEtudiants * 100 ;?>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $percent ?>%"
                            aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Entreprises enregistrées</h5>
                    <h2 class="float-right"><?php echo($countEntreprises ." / ". $countEntrepriseTotal); ?></h2>
                    <?php $percent = $countEntreprises / $countEntrepriseTotal * 100; ?>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $percent ?>%"
                            aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card stat-card">
                <div class="card-body">
                    <h5 class="card-title">Entreprises n'acceptant plus de stagiaires</h5>
                    <h2 class="float-right"><?php echo $countEntreprisesRefus ?> / <?php echo $countEntrepriseTotal ?>
                    </h2>
                    <?php $percent = $countEntreprisesRefus / $countEntrepriseTotal * 100; ?>
                    <div class="progress" style="height: 10px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percent ?>%"
                            aria-valuenow="<?php echo $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
