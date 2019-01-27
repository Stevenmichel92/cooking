        <?php include 'inc/head_info.php' ?>
        <title> Cooking </title> 
    </head>
        <?php 
            include 'inc/header.php';
            include 'inc/nav.php';
        ?>
        
        <div id="carouselExampleSlidesOnly" class="carousel slide slide_format" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/pictures/header/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/pictures/header/2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>

        <div class="container recettes_body">
            <div class="recettes_body_title"> 
                <div class="row">
                    <div class="col-12">
                        <div id="recette">
                            <h2 class="title_body_middle_index">NOS DERNIERES RECETTES</h2>
                        </div>
                    </div>
                </div>    
            </div>  
            <hr>
            <div class="row recette_index_forme" >  
                <?php
                    include 'inc/requete_sql.php';
                    $j = countRecettes();
    
                    for($i=0;$i<=6;$i++){
                        $k=$j-$i;
                        $recette = selectRecettesByIdRecettes();
                        if($recette == true){ ?>
                        <div class="col-sm-12 col-md-6 col-lg-4 ">
                                <?php include 'inc/recette_index.php';?>
                        </div>
                        <?php }
                    }
                ?>
            </div>
        </div>  


        <br><br>  
            <?php
            if($_SESSION['login'] == false){ ?>   
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h3 class="title_body_connexion">Vous voulez partager votre recette, connectez-vous!</h3> 
                    </div>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <form action="connexion.php">
                                <button type="submit" class="btn btn-outline-primary" name="connexion">Connexion</button>
                            </form>
                        </div>
                    </div>    
                </div>
               
                <?php  
            }
            ?> 
            <br>               
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php"; 