        <?php include 'inc/head_info.php' ?>
        <title> Recherche - Cooking </title>  
    </head>
        <?php 
            include 'inc/requete_sql.php';
            include 'inc/header.php';
            include 'inc/nav.php';
            $search = filter_input(INPUT_GET,'search',FILTER_SANITIZE_URL);
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Recherche : <?php echo $search ?></li>
            </ol>
        </nav>   

        <div class="container recettes_body">
            <br><h4>Voici les résultats de votre recherche : <br><strong><?=$search?></strong></h4>
            <div class="row">
            <?php  
                $result = selectRecherche();
                while($recette = $result->fetch(PDO::FETCH_ASSOC)){
                    ?><div class="col-sm-6 col-md-6 col-lg-4" style="margin-top:2%"><?php 
                        $k = $recette['idRecette'];
                        include 'inc/recette_index.php';
                    ?></div>
                <?php } ?>
            </div>
        </div>    
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php"; 
    ?>