<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "contact entreprise";    
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    include '../includes/header.php';   
   include '../middlewares/etudiant.php';  
   include_once '../back_end/creer_contact.php';
?>

<body>
    <?php 
    include '../includes/barnav.php'; 
    ?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Contact d'une entreprise</h5>
                                    <div class="mt-4">

                                        <?php if(isset($success)) {
                                            echo '<p class="text-'.($success == true ? 'success' : 'danger').'">'.$message.'</p>';
                                        } ?>
                                    </div>

                                        <div class="card">
                                            <p class="card-title">Entreprise choisie</p>
                                            <div class="card-body">
                                                <p class="card-text">Nom de l'entreprise : <?php echo $entreprise['NOM_ENTREPRISE'];?></p>
                                                <p class="card-text">Adresse de l'entreprise : <?php echo $entreprise['ADRESSE_ENTREPRISE'];?></p>
                                                <p class="card-text"><?php echo $entreprise['CP_ENTREPRISE'].' '.$entreprise['VILLE_ENTREPRISE'];?></p>
                                                <p class="card-text">Teléphone : <?php echo $entreprise['TEL_ENTREPRISE'];?></p>
                                                <p class="card-text"> Courriel : <?php echo $entreprise['EMAIL_ENTREPRISE'];?></p>
                                                <p class="card-text">  <?php if ($entreprise['REFUS_ANNEESIO1']==1 ) echo'<p> <i class="fad fa-exclamation-circle" style="color:red"></i>refus stagiaire</p>';?>
                                            </div>
                                        </div>
                                        
                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
          <div class="col-sm-12"> 
            <button type="button" name="creer_contact" >
            <a href="creer_contact.php" class="btn btn-block btn-primary btn-lg">Créer un contact qui n'est pas dans la liste</a>
            </button>
          </div>
        </div>



        <div class="lime-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="footer-text">2020 © iStage</span>
                    </div>
                </div>
            </div>
        </div>
    

        <?php include '../includes/footer.php' ?>
</body>
</html>