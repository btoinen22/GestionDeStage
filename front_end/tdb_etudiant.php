<!DOCTYPE html>
<html lang="en">
    
    <?php 
    $title = "Tableau de Bord Etudiant";    
    include '../includes/header.php';   
    include '../middlewares/etudiant.php';     
    include '../back_end/show_data_gen.php'; 
    include '../back_end/show_data_etudiant.php';   
    ?>

    <body>     
      <?php  include '../includes/barnav.php';  
             include 'tbd_gen.php'; 
             if ($countStage==1)
                echo '
                  <div class="row">
                   <h2> Tu as trouvé un stage! RDV en juin , là où tu sais!</h2>
                   </div>';
             else if ($countDemarches >0) 
                    include 'lister_dern_dem_et.php'; 
                 else 
                    include 'lister_dern_entreprise.php';
        ?>
<?php include '../includes/footer.php' ?>
</body>
</html>