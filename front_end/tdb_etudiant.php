<!DOCTYPE html>
<html lang="en">
    
    <?php
    $title = "Tableau de Bord Etudiant";
    require '../includes/header.php';
    require '../middlewares/etudiant.php';
    require '../back_end/show_data_gen.php';
    require '../back_end/show_data_etudiant.php';
    ?>

    <body>     
      <?php  require '../includes/barnav.php';
             require 'tbd_gen.php';
        if ($countStage==1) {
            echo '
                  <div class="row">
                   <h2> Tu as trouvé un stage! RDV en juin , là où tu sais!</h2>
                   </div>';
             
        } elseif ($countDemarches >0) {
                 include 'lister_dern_dem_et.php';
             
        } else {
                     include 'lister_dern_entreprise.php';
                 
        }
        ?>
<?php require '../includes/footer.php' ?>
</body>
</html>
