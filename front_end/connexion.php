<!--   NR le 24/12/2020
//  Ce fichier comporte les afichages de la page de connexion pour un utilisateur quand il a choisi 
// son type, passé en $_GET
// comme tout fichier d'affichage, il comporte des réutilisations de la définition du header et du footer
-->
<!DOCTYPE html>
<html lang="en">

<?php
$title = "Connexion";
require '../includes/header.php';
require '../back_end/connexion.php';
$type = $_GET['type'];
?>

<body class="login-page err-500">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="main-panel">
                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                                <div class="brand-logo">
                                    <img src="../assets/images/logo.png" alt="logo">
                                </div>
                                <!--   NR le 24/12/2020
                                //  préparation de l'affichage de la zone de messages
                                -->
                                <h4>Bienvenue sur iStage ! <br> Connexion en tant que
                                    <?php if ($_GET['type'] == "professeur") {
                                        echo 'professeur.';
                                    } elseif ($_GET['type'] == "etudiant") {
                                        echo 'étudiant.';
                                    } ?></h4>
                                <h6 class="font-weight-light">Veuillez saisir vos identifiant et mot de passe et </h6>
                                <?php if ($show == true) {
                                    echo '
                                    <p class="mt-3 text-' . $color . '">' . $message . '</p>
                                    ';
                                }
                                ?>
                                <!--   NR le 24/12/2020
                                //  formulaire de saisie des informations nécessaires à la connexion
                                -->
                                <form method="POST" id="connexion" class="mt-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg" id="motdepasse" name="motdepasse" placeholder="Mot de passe" required>
                                    </div>
                                    <div class="mt-3">
                                        <button type="submit" name="connexion" id="connexion" class="btn btn-block btn-primary btn-lg">Connexion</button>
                                    </div>
                                    <div class="text-center mt-4 font-weight-light">
                                        Retour au <a href="lobby.php" class="text-primary">Lobby</a>
                                    </div>
                                </form>
                                <button type="button" name="crypte mdp" id="crypte" class="btn btn-block btn-danger btn-lg"><a href="../back_end/Script_mdp_bdr.php">declenche scrypt</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require '../includes/footer.php' ?>

</body>

</html>
