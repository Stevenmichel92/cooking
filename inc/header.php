<body id="body">
    <header class="sticky-top"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-3" >
                    <?php if($_SESSION['admin']){ ?>
                        <a href="admin_recettes.php">
                    <?php }
                        else{ ?>    
                            <a href="index.php">
                    <?php }
                    ?><img src="img/logo-cooking.png" id="logo" alt="logo-cooking"></a>    
                </div>

                <?php if($_SESSION['admin'] == false){?>
                    <form class="form-inline col-sm-12 col-md-6 col-lg-6" action="recherche.php?">
                            <input type="search" class="form-control col-10" name="search" placeholder="Je recherche une recette">
                            <button type="submit" class="btn btn-success col-2">Ok</button>
                    </form>     
                    <?php
                    }
                ?>

                <div class="col-sm-12 col-md-12 col-lg-3">
                    <?php 
                        if($_POST['deconnexion']){
                            session_destroy();
                            header('Location: index.php');
                        }

                        $login = $_SESSION['login'];
                        if($login){
                            ?>
                                <div class="row">
                                    <div class="col-6">
                                        <strong>Bonjour <a href="compte.php?id=<?php echo $login ?>"><?php echo $login ?></a></strong>       
                                    </div>
                                    <div class="col-6">
                                        <form method="post" action="index.php">
                                            <button type="submit" class="btn btn-danger"  name="deconnexion" value="deconnexion">Se deconnecter</button>
                                        </form>   
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary" data-backdrop="false"  data-toggle="modal" data-target="#depot_recette<?php echo $_SESSION['login']?>">Déposer votre recette</button>
                                    </div>    
                                </div>                   
                            <?php
                        }
                        elseif($_SESSION['admin']){ ?>
                            <div class="row">
                                <div class="col-8">
                                    <h3>Espace Administrateur</h3>
                                </div>    
                                <div class="col-4">    
                                    <form method="post" action="index.php">
                                        <button type="submit" class="btn btn-outline-danger"  name="deconnexion" value="deconnexion">Se deconnecter</button>
                                    </form>       
                                </div><?php  
                        }
                        else{
                            ?>  
                                <div class="row justify-content-center">
                                    <div class="col-5">
                                        <form action="connexion.php">
                                            <button type="submit" class="btn btn-primary" name="connexion">Connexion</button>
                                        </form>
                                    </div>
                                </div>    
                            <?php
                        }
                    ?>
                    </div>
                </div>  
            </div>            
        
            <div class="modal fade" id="depot_recette<?php echo $_SESSION['login']?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ma recette</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php 
                                function GUID()
                                {
                                    if (function_exists('com_create_guid') === true)
                                    {
                                        return trim(com_create_guid(), '{}');
                                    }
                            
                                    return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
                                }
                            
                                $fichier = $_FILES["fileToUpload"]["name"];

                                $info = pathinfo($_FILES["fileToUpload"]["name"]);
                                $ext = $info['extension'];
                                $files = GUID() . "." . $ext;

                                    if(isset($_POST["titre"])){
                                        $depot = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                                        $id = $_SESSION['login'];
                                        include 'inc/requete_sql.php';
                                        $max = selectMaxIdRecette();
                                        $newMax = $max["MAX(idRecette)"] + 1;
                                        $membre = depotRecetteMembre();
                                        depotRecette();
                                        echo "Recette ajoutée avec succès!<br>";
                                    }
                                ?>
                        <div class="container" id="depot_recette_body">
                            <div class="row">
                                <div class="col-12" >  
                                    <form method="post" enctype="multipart/form-data">
                                        <label for="fileToUpload" class="depot_recette_body_title">Image</label><br>
                                        <input type="file" name="fileToUpload" id="fileToUpload" >
                                            <?php 
                                                if($files){
                                                    $target = 'img/pictures/recettes/'.$files;
                                                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target);
                                                    echo "<br><br>";
                                                }
                                                else{
                                                    echo "<br><br>";
                                                }
                                            ?>
                                        <label for="titre" class="depot_recette_body_title">Titre</label><br>
                                        <input type="text" name="titre" id="titre" placeholder="Mon titre pour ma recette" maxlength="80" size="30" required><br><br> 
                                        <label for="commentaire" class="depot_recette_body_title">Commentaire</label><br>
                                        <textarea rows="4" cols="30" name="commentaire" id="commentaire" placeholder="Mon commentaire" minlength="200" maxlength="300" ></textarea><br><br>
                                        <label for="preparation" class="depot_recette_body_title">Préparation</label><br>
                                        <textarea rows="4" cols="30" name="preparation" id="preparation" placeholder="La préparation" ></textarea><br><br> 
                                        <label for="ingredient" class="depot_recette_body_title">Ingrédients</label><br>
                                        <textarea rows="4" cols="30" name="ingredient" id="ingredient" placeholder="Les ingrédients" ></textarea><br><br> 
                                        <label for="color" class="depot_recette_body_title">Couleur</label><br>
                                        <input type="radio" name="color" id="color" value="fushia" checked>Fushia
                                            <div class="fushia position_Color">
                                            </div><br><br>
                                        <input type="radio" name="color" value="bleuClair"> Bleu clair
                                            <div class="bleuClair position_Color">
                                            </div><br><br>
                                        <input type="radio" name="color" value="other"> Vert clair  
                                            <div class="vertClair position_Color">
                                            </div><br><br>
                                        <label for="viande" class="depot_recette_body_title">Catégorie</label><br>
                                            <input type="radio" name="categorie" id="viande" value="1" checked>Viande  
                                        <label for="legume" class="depot_recette_body_title"></label>
                                            <input type="radio" name="categorie" id="legume" value="2" >Légume
                                        <label for="poisson" class="depot_recette_body_title"></label>
                                            <input type="radio" name="categorie" id="poisson" value="3" >Poisson
                                        <label for="fruit" class="depot_recette_body_title"></label>
                                            <input type="radio" name="categorie" id="fruit" value="4" >Fruit<br><br><br>
                                        <label for="temps_cuisson" class="depot_recette_body_title">Temps de cuisson</label><br>
                                        <input type="number" name="temps_cuisson" id="temps_cuisson" min="0" style="width:40px" > min<br><br> 
                                        <label for="temps_préparation" class="depot_recette_body_title">Temps de préparation</label><br>
                                        <input type="number" name="temps_préparation" id="temps_préparation" min="0" style="width:40px" > min<br><br><br>   
                                        <label for="difficulte" class="depot_recette_body_title">Difficultés</label><br>
                                            <select name="difficulte" id="difficulte">
                                                <option value="facile">Facile</option>
                                                <option value="moyen">Moyen</option>
                                                <option value="difficile">Difficile</option>
                                            </select><br><br>
                                        <label for="prix" class="depot_recette_body_title">Prix</label><br>
                                            <select name="prix" id="prix">
                                                <option value="pascher">Pas cher</option>
                                                <option value="moyencher">Moyen cher</option>
                                                <option value="cher">Cher</option>
                                            </select><br><br>    
                    
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                            <button type="submit" name="depot_recette" class="btn btn-primary">Envoyer ma recette</button> 
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>