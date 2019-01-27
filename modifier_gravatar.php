<?php include 'inc/head_info.php' ?>
        <title> Modifier Mot de passe - Cooking </title>  
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
                <li class="breadcrumb-item active" aria-current="page">Modification avatar</li>
            </ol>
        </nav>  

        <h2> Mon compte </h2>

        <div class="container recettes_body">
            <div class="row justify-content-center"> 
                <?php
                    $files = $_FILES["fileTo"]["name"];

                    if($files){
                        updateGravatar();
                        echo "Image changée avec succès!<br>";
                    }    
                ?>
                
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <br><label for="fileTo">Mon nouvel avatar</label><br>
                        <input type="file" class="btn btn-light"  name="fileTo" id="fileTo" required>
                    </div>
                    <?php 
                        if($files){
                            include 'inc/upload_gravatar.php';
                            echo "<br>";
                        }
                        else{
                            echo "<br>";
                        }
                    ?>
                    <div class="row justify-content-center">
                        <input type="submit" class="btn btn-info" name="inscrire" value="Modifier"><br><br> 
                    </div>
                </form>    
            </div>
        </div>  
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php";      
  



        