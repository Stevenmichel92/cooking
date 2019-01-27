        <?php include 'inc/head_info.php' ?>
        <title> Recettes - Cooking </title>  
    </head>
        <?php 
            include 'inc/header.php';
            include 'inc/nav.php';
            include 'inc/requete_sql.php';
            $j = countRecettes();
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Recettes</li>
            </ol>
        </nav>    

        <div class="container recettes_body">
            <h2 class="title_body_middle_index"> Nos recettes</h2>
            <hr>
            <div class="row">
                <?php
                    for($k=2;$k<=$j;$k++){
                        $recette = selectRecettesByIdRecettes();
                        if($recette == true){
                            ?>
                            <div class="col-sm-6 col-md-6 col-lg-4" style="margin-top:2%">
                            <?php  include 'inc/recette_index.php'; ?>
                            </div>
                            <?php 
                        }    
                    }
                ?>
            </div>
        </div>            
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php"; 
    ?>   