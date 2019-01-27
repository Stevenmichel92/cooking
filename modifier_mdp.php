        <?php include 'inc/head_info.php' ?>
        <title> Modifier mot de passe - Cooking </title>  
    </head>
        <?php
            include 'inc/requete_sql.php'; 
            include 'inc/header.php';
            include 'inc/nav.php';
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="compte.php?id=<?php echo $login ?>">Mon compte</a></li>
                <li class="breadcrumb-item active" aria-current="page">Modification mot de passe</li>
            </ol>
        </nav>

        <h2> Mon compte </h2>

        <?php
            if($_POST != NULL){
                $mdp = filter_input(INPUT_POST,'mdp',FILTER_SANITIZE_FULL_SPECIAL_CHARS);    
                $hash = password_hash($mdp, PASSWORD_DEFAULT); 
                modifyMDP();      
                echo "Mot de passe modifié avec succès";
            }
        ?>

        <div class="container recettes_body">
            <div class="row justify-content-center"> 
                <div class="form-group">
                    <form method="post">
                        <br><label for="mdp">Mon nouveau mot de passe</label><br>
                        <input type="password" class="form-control" id ="mdp" name="mdp"><br>

                        <div class="row justify-content-center"> 
                            <input type="submit" class="btn btn-info" name="envoyer" value="Changer"> 
                        </div>
                    </form>    
                </div>
            </div>
        </div>  
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php"; 
    ?>
       