        <?php include 'inc/head_info.php' ?>
        <title> Mon compte - Cooking </title>   
    </head>
        <?php 
            include 'inc/requete_sql.php';
            include 'inc/header.php';
            include 'inc/nav.php';
        ?>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Mon compte</li>
            </ol>
        </nav>  

        <?php
            $login = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
            $compte = selectCompte();
        ?>
        <div id="myTable">
            <div class="container recettes_body">
                <br>
                <h2> Mon compte </h2><br>
                <div class="row justify-content-center compte_body">
                    <div class="col-12">
                        <h2><?php echo $compte['login'] ?><br></h2>
                        <div class="row justify-content-center">
                            <img src="img/pictures/gravatars/<?php echo $compte['gravatar'] ?>" width="200" height="200" alt="<?php echo $compte['gravatar'] ?>" class="img_compte">  
                        </div>    
                    </div>
                    <br><br>
                    <div class="col-12">
                        <div class="row justify-content-center">
                            <div class="col-12 ">
                                <div class="row justify-content-center">
                                    <h4><?php echo $compte['prenom'] ?></h4><br>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <div class="row justify-content-center">    
                                    <h4><?php echo $compte['nom'] ?></h4>
                                </div>
                            </div>
                            <br><strong>Membre depuis <?php echo substr($compte['dateCrea'],0,4) ?></strong>
                        </div>
                    </div>    
                </div>    
                <hr>
                <div class="row justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-sm-12 col-md-4">
                            <div class="row justify-content-center">
                                <form action="modifier_mdp.php">
                                    <button type="submit" class="btn btn-info">Modifier mon mot de passe</button>
                                </form>
                            </div>
                        </div><br><br>     
                        <div class="col-sm-12 col-md-4">
                            <div class="row justify-content-center">
                                <form action="modifier_gravatar.php">
                                    <button type="submit" class="btn btn-info">Modifier mon avatar<br></button>
                                </form>
                            </div>
                        </div><br><br> 
                        <?php
                            $pdo = pdo();
                            $result = $pdo->query("SELECT * FROM membres WHERE login = '$login'");
                            $membre = $result->fetch(PDO::FETCH_ASSOC);

                            $list = array (
                                array('Informations membre'), 
                                array('login', 'Mot de passe', 'Statut', 'Prenom', 'Nom', 'Date de creation', 'Gravatar'),
                                array($membre['login'], $membre['password'], $membre['statut'], $membre['prenom'], $membre['nom'], $membre['dateCrea'], $membre['gravatar']),
                                array(''),  
                            );

                            $list2 = array (
                                array('Informations recettes'),
                                array('titre', 'chapo', 'img', 'preparation', 'ingredient', 'couleur', 'dateCrea', 'tempsCuisson', 'tempsPreparation', 'difficulte', 'prix'),
                            );

                            $result2 = $pdo->query("SELECT r.titre, r.chapo, r.img, r.preparation, r.ingredient, r.couleur, r.dateCrea, r.tempsCuisson, r.tempsPreparation, r.difficulte, r.prix FROM membres m, recettes r WHERE login = '$login' AND m.idMembre = r.membre");
                            $recette = $result2->fetchAll();

                            $fp = fopen('file.csv', 'w');

                            foreach ($list as $fields) {
                                fputcsv($fp, $fields);
                            }

                            foreach ($list2 as $fields) {
                                fputcsv($fp, $fields);
                            }

                            $j = countRecettes();
                            for($i=0;$i<=$j;$i++){
                                foreach (array($recette[$i]) as $fields) {
                                    fputcsv($fp, $fields);
                                }
                            }
                            fclose($fp);

                            $fichier = 'file.csv';
                            
                            header('Content-disposition: '.$fichier);
                            header('Content-type: application/octetstream');
                            
                        ?>

                        <div class="col-sm-12 col-md-4">
                            <div class="row justify-content-center">
                                <form action="file.csv">
                                    <button type="submit" class="btn btn-secondary">Télécharger vos données<br></button>
                                </form>
                            </div>
                        </div><br><br><br>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <br><br><button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $compte['login'] ?>">Supprimer mon compte</button>
                        
                    <div class="modal" id="exampleModal<?php echo $compte['login'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Confirmation suppression compte</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Etes-vous sure de vouloir supprimer votre compte?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                <form method="post">
                                    <button type="submit" class="btn btn-primary" name="supprimer_compte" id="supprimer_compte">Supprimer compte</button>
                                </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <h4> Mes recettes </h4>  
                <div class="row">
                    <?php
                        $pdo=pdo();
                        if($_POST){
                        session_destroy();  
                        $result = $pdo->query("SELECT * FROM membres WHERE login = '$login' ");
                        $membre = $result->fetch(PDO::FETCH_ASSOC);
                        $idsupp =  $membre['idMembre'];
                        $pdo->exec("DELETE FROM recettes WHERE membre = $idsupp");
                        $pdo->exec("DELETE FROM membres WHERE login = '$login'"); 
                        }

                        $result = selectCompteRecette();
                        $j=0;
                        while($recette = $result->fetch(PDO::FETCH_ASSOC)){
                            $j=$j + 1
                            ?><div class="col-sm-6 col-md-6 col-lg-4 "><?php 
                                $k = $recette['idRecette'];
                                include 'inc/recette_index.php';?>
                                <button type="button" class="btn btn-danger" onclick="deleteRecette('<?php echo $recette['idRecette'] ?>')"><i class="fas fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#md_upload" onclick="getRecette('<?php echo $recette['idRecette'] ?>')"><i class="fas fa-edit"></i></button><hr>
                                </div><?php
                        }
                        if($j == 0){
                            ?><div class="col-12 "><?php 
                            echo "Aucune recette déposée";
                            ?></div><?php
                        }
                    ?>
                </div>    
            </div>  
        </div>

        <div class="modal fade" id="md_upload"  tabindex="-1" role="dialog" aria-labelledby="exampleMod" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" id="myform_update" action="ajax/updateRecette_ajax.php" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleMod">Modification recette</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        
                        <div class="form-group">
                            <label for="idRecette"><strong>idRecette</strong></label>
                            <input type="text" class="form-control" id="idRecette" name="idRecette" placeholder="idRecette">
                        </div>

                        <div class="form-group">
                            <label for="update_login">Login</label>
                            <select class="form-control" id="update_login" name="update_login">
                                <option value="-1" selected>...</option>

                                <?php
                                    $pdo =pdo();
                                    $result = $pdo->query("SELECT * FROM membres");

                                    while($membre = $result->fetch(PDO::FETCH_ASSOC))
                                    {
                                        ?>
                                            <option value="<?php echo $membre["idMembre"] ?>"><?php echo $membre["login"] ?></option>
                                        <?php
                                    }
                                    ?>
                                    
                            </select>
                        </div>

                        <div class="form-group">
                                <label for="update_titre">Titre</label>
                                <input type="text" class="form-control" id="update_titre" name="update_titre" placeholder=" titre">
                            </div>

                            <div class="form-group">
                                <label for="update_chapo">Chapo</label>
                                <textarea class="form-control" id="update_chapo" name="update_chapo"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="update_preparation">Préparation</label>
                                <textarea class="form-control" id="update_preparation" name="update_preparation"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="update_ingredient">Ingrédient</label>
                                <textarea class="form-control" id="update_ingredient" name="update_ingredient"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="update_couleur"><strong>Couleur</strong></label>
                                <input type="text" class="form-control" id="update_couleur" name="update_couleur" placeholder=" couleur">
                                <!-- <select class="form-control" id="couleur" name="couleur">
                                    <option value="-1" selected>fushia</option>
                                    <option value="-1" >Vert Clair</option>
                                    <option value="-1" >Bleu Clair</option>
                                </select> -->
                            </div>

                            <div class="form-group">
                                <label for="update_cuisson">Temps de cuisson</label>
                                <input type="text" class="form-control" id="update_cuisson" name="update_cuisson" placeholder=" Temps de cuisson">
                            </div>

                            <div class="form-group">
                                <label for="update_tempspreparation">Temps de préparation</label>
                                <input type="text" class="form-control" id="update_tempspreparation" name="update_tempspreparation" placeholder=" Temps de préparation">
                            </div>

                            <div class="form-group">
                                <label for="update_difficulte">Difficulté</label>
                                <input type="text" class="form-control" id="update_difficulte" name="update_difficulte" placeholder=" difficulte">
                                <!--<select class="form-control" id="difficulte" name="difficulte">
                                    <option value="-1" selected>Facile</option>
                                    <option value="-1" >Moyen</option>
                                    <option value="-1" >Difficile</option>
                                </select> -->
                            </div>

                            <div class="form-group">
                                <label for="update_prix">Prix</label>
                                <input type="text" class="form-control" id="update_prix" name="update_prix" placeholder=" prix">
                                <!--<select class="form-control" id="prix" name="prix">
                                    <option value="-1" selected>Pas cher</option>
                                    <option value="-1" >Moyen cher</option>
                                    <option value="-1" >Cher</option>
                                </select>-->
                            </div>

                            <div class="form-group">
                                <label for="update_myimg">Image</label>
                                <input type="file" class="form-control" id="update_myimg" name="update_myimg">
                            </div>
                            <div id="alert_save" style="display:none;" class="alert alert-success" role="alert">
                                C'est ok!
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <input type="submit" class="btn btn-primary" value="Enregistrer"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            

        <script>                

            // UPDATE recette
            $(document).ready(function (e) {
                $("form#myform_update").submit(function(e) {

                    e.preventDefault();
                    
                    let request = $.ajax({
                        type: 'POST',
                        url: $("#myform_update").attr('action'),
                        data: new FormData(this),
                        cache: false,
                        contentType: false,
                        processData: false
                    });

                    request.done(function(result){
                        
                        refreshData();
                        $('#md_upload').modal('hide');

                    });

                    request.fail(function(result){
                        alert("NOOK");
                    });
                });
            });

            function getRecette(idRecette) {
                let request = $.ajax({
                    'url' : 'ajax/getRecette_ajax.php',
                    'type': 'POST',
                    'data': { 
                            'idRecette': idRecette
                        }
                });
                
                request.done(function(result) {
        
                    let obj = jQuery.parseJSON(result);

                    $("#idRecette").val(obj.idRecette) 
                    $("#update_login option[value='" + obj.idMembre + "']").prop('selected', true);
                    $("#update_titre").val(obj.titre); 
                    $("#update_chapo").val(obj.chapo);                      
                    $("#update_preparation").val(obj.preparation);
                    $("#update_ingredient").val(obj.ingredient);
                    $("#update_couleur").val(obj.couleur);
                    $("#update_cuisson").val(obj.tempsCuisson);
                    $("#update_tempspreparation").val(obj.tempsPreparation);
                    $("#update_difficulte").val(obj.difficulte);
                    $("#update_prix").val(obj.prix);
                    $("#update_myimg").val(obj.img);
                });    
                request.fail(function() {     
                });
            }

            function deleteRecette(idRecette) {
                let request = $.ajax({
                    'url' : 'ajax/deleteRecette_ajax.php',
                    'type': 'POST',
                    'data': { 
                                'idRecette': idRecette
                            }
                });
                request.done(function(result) {

                    if (result == 1) {

                        refreshData();

                    }
                });    
                request.fail(function() {

                });
            }

            function refreshData() {
                $('#myTable').load(document.URL +  ' #myTable');
            }
        </script>
    <?php
        include "inc/social_networks.php";
        include "inc/footer.php";   