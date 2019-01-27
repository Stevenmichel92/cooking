        <?php include 'inc/head_info.php' ?>
        <title> Détail membre - Cooking </title>  
    </head>
        <?php 
            include 'inc/requete_sql.php';
            include 'inc/header.php';
            include 'inc/nav.php';
            $membre = filter_input(INPUT_GET,'id',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Recettes de <?php echo $membre ?></li>
            </ol>
        </nav>   

        <div class="container recettes_body">
            <h3 class="title_body_middle_index"> Les recettes de <?php echo $membre ?></h3>  
            <br><hr>
            <div class="row">
                <?php                               
                    $result = selectRecetteMembre();
                    while($recette = $result->fetch(PDO::FETCH_ASSOC)){
                        ?><div class="col-sm-6 col-md-6 col-lg-4"><?php 
                            $k = $recette['idRecette'];
                            include 'inc/recette_index.php';
                        ?></div><?php
                    }
                ?>
            </div>    
        </div>  
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php";      